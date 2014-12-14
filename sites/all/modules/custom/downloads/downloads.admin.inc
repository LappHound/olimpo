<?php


function downloads_list_downloads_page() {
  drupal_add_css(drupal_get_path('module', 'downloads') . '/downloads.admin.css');

  $headers = array(t('Title'), t('File'), t('Created at'));
  $downloads = downloads_get_all_downloads();

  $rows = array();
  foreach ($downloads as $download) {
    $rows[] = array(
      l($download['title'], "admin/downloads/{$download['id']}"),
      l('', $download['filepath'], array('attributes' => array('class' => 'download'))),
      date('d/m/Y H:i', $download['created_at'])
    );
  }

  return theme('table', $headers, $rows);
}


function downloads_add_download_page() {
  return drupal_get_form('downloads_add_download_form');
}


function downloads_add_download_form(&$form_state) {
  $form = array(
    '#attributes' => array('enctype' => 'multipart/form-data')
  );

  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#required' => TRUE
  );
  $form['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#required' => TRUE
  );
  $form['file'] = array(
    '#type' => 'file',
    '#title' => t('Upload file'),
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Create download')
  );

  return $form;
}


function downloads_add_download_form_validate(&$form_state) {
  if (!isset($_FILES['files']['tmp_name']['file'])) {
    form_set_error('file', t('You have to upload the file'));
  }
}


function downloads_add_download_form_submit($form, &$form_state) {
  if ($file = file_save_upload('file', array(), file_directory_path() . '/downloads')) {
    db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
    db_query("INSERT INTO {downloads} (title, description, file_id, created_at) VALUES ('%s', '%s', %d, %d)", $form_state['values']['title'], $form_state['values']['description'], $file->fid, time());

    drupal_set_message(t('Download created'));
    $form_state['redirect'] = 'admin/downloads';
  }
}


function downloads_update_download_page($download_id) {
  $query = "SELECT d.*, f.filepath FROM {downloads} d INNER JOIN {files} f ON f.fid = d.file_id WHERE d.id = %d";
  $db_result = db_query($query, $download_id);
  $download = db_fetch_array($db_result);

  return drupal_get_form('downloads_update_download_form', $download);
}


function downloads_update_download_form(&$form_state, array $download) {
  $form = array(
    '#attributes' => array('enctype' => 'multipart/form-data')
  );

  $form['download_id'] = array(
    '#type' => 'hidden',
    '#value' => $download['id']
  );

  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => $download['title'],
    '#required' => TRUE
  );
  $form['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#default_value' => $download['description'],
    '#required' => TRUE
  );
  $form['current_file'] = array(
    '#type' => 'markup',
    '#value' => l($download['title'], $download['filepath'], array('attributes' => array('class' => 'download'))),
    '#prefix' => '<div class="form-item"><label>' . t('Previous file') . '</label></div>',
    '#suffix' => '</div>'
  );
  $form['file'] = array(
    '#type' => 'file',
    '#title' => t('Upload file'),
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Update download')
  );
  $form['delete'] = array(
    '#type' => 'submit',
    '#value' => t('Delete'),
    '#attributes' => array('style' => 'background-color: #d24146;'),
    '#suffix' => t('or !cancel', array('!cancel' => l(t('Cancel'), 'admin/downloads/list')))
  );

  return $form;
}


function downloads_update_download_form_submit($form, &$form_state) {
  if ($form_state['values']['op'] == t('Update download')) {
    $file = FALSE;

    if (isset($_FILES['files']['tmp_name']['file']) && trim($_FILES['files']['tmp_name']['file']) != '') {
      if ($file = file_save_upload('file', array(), file_directory_path() . '/downloads')) {
        db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
      }
    }

    if ($file) {
      db_query("UPDATE {downloads} SET title = '%s', description = '%s', file_id = %d, created_at = %d WHERE id = %d", $form_state['values']['title'], $form_state['values']['description'], $file->fid, time(), $form_state['values']['download_id']);
    }
    else {
      db_query("UPDATE {downloads} SET title = '%s', description = '%s' WHERE id = %d", $form_state['values']['title'], $form_state['values']['description'], $form_state['values']['download_id']);
    }

    drupal_set_message(t('Download updated'));
  }
  else {
    db_query("DELETE FROM {downloads} WHERE id = %d", $form_state['values']['download_id']);

    drupal_set_message(t('Download deleted'));
  }

  $form_state['redirect'] = 'admin/downloads';
}

function downloads_remove_download_page() {
  return drupal_get_form('downloads_remove_download_form');
}
