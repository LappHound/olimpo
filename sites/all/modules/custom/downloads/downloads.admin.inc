<?php


function downloads_list_downloads_page() {
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
  $file = file_save_upload('file', array(), file_directory_path() . '/downloads');
  db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
  db_query("INSERT INTO {downloads} (title, description, file_id, created_at) VALUES ('%s', '%s', %d, %d)", $form_state['values']['title'], $form_state['values']['description'], $file->fid, time());
  $id = db_last_insert_id('downloads', 'id');
  $form_state['redirect'] = "admin/downloads/$id";
}


function downloads_update_download_page($download_id) {
  return drupal_get_form('downloads_update_download_form');
}


function downloads_remove_download_page() {
  return drupal_get_form('downloads_remove_download_form');
}
