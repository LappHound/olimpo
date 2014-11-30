<?php


function track_record_admin_page() {
  return theme('track_record_admin_page');
}


function track_record_club_admin_page() {
  $club = track_record_get_club_information();
  $medal_options = track_record_get_medals_for_select();
  $headers = array(t('Title'), t('Medal'));
  $rows = array();
  foreach ($club['records'] as $record) {
    $rows[] = array(
      l($record['title'], "admin/track_record/club/records/{$record['id']}"),
      $medal_options[$record['medal']]
    );
  }

  $content = '<h1>' . t('Club administration') . '</h1>';
  $content .= '<div class="add-form">' . drupal_get_form('track_record_edit_club_form', $club) . '</div>';
  $content .= theme('table', $headers, $rows);
  $content .= l(t('Add to track record'), "admin/track_record/club/records");

  return $content;
}


function track_record_edit_club_form($form_state, $club) {
  $form = array(
    '#attributes' => array('enctype' => 'multipart/form-data')
  );

  $form['club'] = array(
    '#type' => 'hidden',
    '#value' => $club['id']
  );
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#default_value' => $club['name'],
    '#required' => TRUE
  );
  $form['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Descripion'),
    '#default_value' => $club['description']
  );
  $form['establishment_date'] = array(
    '#type' => 'date',
    '#title' => t('Establishment date'),
    '#default_value' => array(
      'year' => date('Y', $club['establishment_date']),
      'month' => date('n', $club['establishment_date']),
      'day' => date('j', $club['establishment_date']),
    )
  );
  $form['old_photo'] = array(
    '#type' => 'markup',
    '#value' => theme('track_record_club_photo', $club)
  );
  $form['photo'] = array(
    '#type' => 'file',
    '#title' => t('New photo')
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Update')
  );

  return $form;
}


function track_record_edit_club_form_submit($form, &$form_state) {
  $establishment_date = strtotime("{$form_state['values']['establishment_date']['year']}-{$form_state['values']['establishment_date']['month']}-{$form_state['values']['establishment_date']['day']}");
  $description = trim($form_state['values']['description']) ? $form_state['values']['description'] : NULL;

  if ($file = file_save_upload('photo', array(), file_directory_path() . '/track_record_images')) {
    db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
    db_query("UPDATE {track_record_clubs} SET photo_id = %d WHERE id = 1", $file->fid);
  }

  if ($description) {
    db_query("UPDATE {track_record_clubs} SET name = '%s', establishment_date = %d, description = '%s' WHERE id = 1", $form_state['values']['name'], $establishment_date, $description);
  }
  else {
    db_query("UPDATE {track_record_clubs} SET name = '%s', establishment_date = %d, description = NULL WHERE id = 1", $form_state['values']['name'], $establishment_date);
  }

  drupal_set_message(t('Club information was updated'));

  cache_clear_all();
}

function track_record_club_records_admin_page() {
  return drupal_get_form('track_record_add_club_record_form', track_record_get_club_information());
}


function track_record_get_medals_for_select() {
  $medals = array(
    '' => t('Nothing'),
    TRACK_RECORD_GOLD_MEDAL => t('Gold'),
    TRACK_RECORD_SILVER_MEDAL => t('Silver'),
    TRACK_RECORD_BRONZE_MEDAL => t('Bronze'),
  );

  return $medals;
}


function track_record_add_club_record_form($form_state, $club) {
  $form = array();

  $form['club'] = array(
    '#type' => 'hidden',
    '#value' => $club['id']
  );
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title')
  );
  $form['medal'] = array(
    '#type' => 'select',
    '#title' => t('Medal'),
    '#options' => track_record_get_medals_for_select()
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save')
  );

  return $form;
}


function track_record_add_club_record_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  if ($values['medal'] != '') {
    db_query("INSERT INTO {track_record_club_records} (title, medal, club_id) VALUES ('%s', %d, %d)", $values['title'], $values['medal'], $values['club']);
  }
  else {
    db_query("INSERT INTO {track_record_club_records} (title, club_id) VALUES ('%s', %d)", $values['title'], $values['club']);
  }

  drupal_set_message(t('Club record was added'));

  $form_state['redirect'] = 'admin/track_record/club';

  cache_clear_all();
}


function track_record_edit_club_record_admin_page($record_id) {
  $record = track_record_get_club_record_information($record_id);
  $content .= drupal_get_form('track_record_edit_club_record_form', $record);

  return $content;
}


function track_record_edit_club_record_form($form_state, $record) {
  $form = array();

  $form['record'] = array(
    '#type' => 'hidden',
    '#value' => $record['id']
  );
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => $record['title'],
    '#required' => TRUE
  );
  $form['medal'] = array(
    '#type' => 'select',
    '#title' => t('Medal'),
    '#options' => track_record_get_medals_for_select(),
    '#default_value' => $record['medal']
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Update'),
  );
  $form['delete'] = array(
    '#type' => 'submit',
    '#value' => t('Delete'),
    '#attributes' => array('style' => 'background-color: #d24146;'),
    '#suffix' => t('or !cancel', array('!cancel' => l(t('Cancel'), 'admin/track_record/club')))
  );

  return $form;
}


function track_record_edit_club_record_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  if ($values['op'] == t('Update')) {
    if ($values['medal'] != '') {
      db_query("UPDATE {track_record_club_records} SET title = '%s', medal = %d WHERE id = %d", $values['title'], $values['medal'], $values['record']);
    }
    else {
      db_query("UPDATE {track_record_club_records} SET title = '%s', medal = NULL WHERE id = %d", $values['title'], $values['record']);
    }
  }
  else {
    db_query("DELETE FROM {track_record_club_records} WHERE id = %d", $values['record']);
  }

  drupal_set_message(t('Club record was updated'));

  $form_state['redirect'] = 'admin/track_record/club';

  cache_clear_all();
}

function track_record_athletes_admin_page() {
  $athletes = track_record_get_athletes_information();
  $headers = array(t('Name'), t('Birthday'), t('Photo'));
  $rows = array();
  foreach ($athletes as $athlete) {
    $rows[] = array(
      l($athlete['name'], "admin/track_record/athletes/{$athlete['id']}"),
      date('d-m-Y', $athlete['birthday']),
      !is_null($athlete['photo_id']) ? t('Yes') : t('No')
    );
  }

  $content = '<h1>' . t('Athletes administration') . '</h1>';
  $content .= '<div class="add-form">' . drupal_get_form('track_record_add_athlete_form') . '</div>';
  $content .= theme('table', $headers, $rows);

  return $content;
}


function track_record_add_athlete_form(&$form_state) {
  $form = array(
    '#attributes' => array('enctype' => 'multipart/form-data')
  );
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#required' => TRUE
  );
  $form['birthday'] = array(
    '#type' => 'date',
    '#title' => t('Birthday')
  );
  $form['photo'] = array(
    '#type' => 'file',
    '#title' => t('Photo')
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Create athlete')
  );

  return $form;
}


function track_record_add_athlete_form_submit($form, &$form_state) {
  $birthday = strtotime("{$form_state['values']['birthday']['year']}-{$form_state['values']['birthday']['month']}-{$form_state['values']['birthday']['day']}");

  if ($file = file_save_upload('photo', array(), file_directory_path() . '/track_record_images')) {
    db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
    db_query("INSERT INTO {track_record_athletes} (name, birthday, photo_id) VALUES ('%s', %d, %d)", $form_state['values']['name'], $birthday, $file->fid);
  }
  else {
    db_query("INSERT INTO {track_record_athletes} (name, birthday) VALUES ('%s', %d)", $form_state['values']['name'], $birthday);
  }

  drupal_set_message(t('New athlete was added'));

  cache_clear_all();
}


function track_record_athlete_admin_page($athlete_id) {
  $athlete = track_record_get_athlete_information($athlete_id);

  $content = drupal_get_form('track_record_update_athlete_form', $athlete);

  return $content;
}


function track_record_update_athlete_form($form_state, array $athlete) {
  $form = array(
    '#attributes' => array('enctype' => 'multipart/form-data')
  );
  $form['athlete_id'] = array(
    '#type' => 'hidden',
    '#value' => $athlete['id']
  );
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#default_value' => $athlete['name'],
    '#required' => TRUE
  );
  $form['birthday'] = array(
    '#type' => 'date',
    '#title' => t('Birthday'),
    '#default_value' => array(
      'year' => date('Y', $athlete['birthday']),
      'month' => date('n', $athlete['birthday']),
      'day' => date('j', $athlete['birthday']),
    )
  );
  if (isset($athlete['photo'])) {
    $form['old_photo'] = array(
      '#type' => 'markup',
      '#value' => theme('track_record_athlete_photo', $athlete)
    );
  }
  $form['photo'] = array(
    '#type' => 'file',
    '#title' => t('New photo')
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Update athlete')
  );

  $rows = array();
  $medal_options = track_record_get_medals_for_select();
  foreach ($athlete['records'] as $record) {
    $rows[] = array(
      l($record['title'], "admin/track_record/athletes/{$athlete['id']}/records/{$record['id']}"),
      $medal_options[$record['medal']]
    );
  }

  $form['track_record'] = array(
    '#type' => 'markup',
    '#value' => theme('table', array(t('Title'), t('Medal')), $rows)
  );

  $form['add_track_record'] = array(
    '#type' => 'markup',
    '#value' => l(t('Add to track record'), "admin/track_record/athletes/{$athlete['id']}/records")
  );

  return $form;
}


function track_record_update_athlete_form_submit($form, &$form_state) {
  if (isset($_FILES['files']['tmp_name']['photo'])) {
    $file = file_save_upload('photo', array(), file_directory_path() . '/track_record_images');
    db_query("UPDATE {files} SET status=%d WHERE fid=%d", FILE_STATUS_PERMANENT, $file->fid);
  }
  $birthday = strtotime("{$form_state['values']['birthday']['year']}-{$form_state['values']['birthday']['month']}-{$form_state['values']['birthday']['day']}");
  if (isset($file) && isset($file->fid)) {
    db_query("UPDATE {track_record_athletes} SET name = '%s', birthday = %d, photo_id = %d WHERE id = %d", $form_state['values']['name'], $birthday, $file->fid, $form_state['values']['athlete_id']);
  }
  else {
    db_query("UPDATE {track_record_athletes} SET name = '%s', birthday = %d WHERE id = %d", $form_state['values']['name'], $birthday, $form_state['values']['athlete_id']);
  }

  drupal_set_message(t('Athlete was updated'));

  cache_clear_all();
}


function track_record_athlete_records_admin_page($athlete_id) {
  $athlete = track_record_get_athlete_information($athlete_id);
  $content .= drupal_get_form('track_record_add_athlete_record_form', $athlete);

  drupal_set_title(t('Add entry to @name track record', array('@name' => $athlete['name'])));

  return $content;
}


function track_record_add_athlete_record_form($form_state, $athlete) {
  $form = array();

  $form['athlete_id'] = array(
    '#type' => 'hidden',
    '#value' => $athlete['id']
  );
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#required' => TRUE
  );
  $form['medal'] = array(
    '#type' => 'select',
    '#title' => t('Medal'),
    '#options' => track_record_get_medals_for_select()
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    '#suffix' => t('or !cancel', array('!cancel' => l(t('Cancel'), 'admin/track_record/athletes/' . $athlete['id'])))
  );

  return $form;
}


function track_record_add_athlete_record_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  if ($values['medal'] != '') {
    db_query("INSERT INTO {track_record_athlete_records} (title, medal, athlete_id) VALUES ('%s', %d, %d)", $values['title'], $values['medal'], $values['athlete_id']);
  }
  else {
    db_query("INSERT INTO {track_record_athlete_records} (title, athlete_id) VALUES ('%s', %d)", $values['title'], $values['athlete_id']);
  }

  drupal_set_message(t('Athlete record was added'));

  $form_state['redirect'] = 'admin/track_record/athletes/' . $values['athlete_id'];

  cache_clear_all();
}


function track_record_athlete_update_record_admin_page($record_id) {
  $record = track_record_get_athlete_record_information($record_id);
  $content .= drupal_get_form('track_record_update_athlete_record_form', $record);

  return $content;
}


function track_record_update_athlete_record_form($form_state, $record) {
  $form = array();

  $form['record'] = array(
    '#type' => 'hidden',
    '#value' => $record['id']
  );
  $form['athlete_id'] = array(
    '#type' => 'hidden',
    '#value' => $record['athlete_id']
  );
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => $record['title'],
    '#required' => TRUE
  );
  $form['medal'] = array(
    '#type' => 'select',
    '#title' => t('Medal'),
    '#options' => track_record_get_medals_for_select(),
    '#default_value' => $record['medal']
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Update'),
  );
  $form['delete'] = array(
    '#type' => 'submit',
    '#value' => t('Delete'),
    '#attributes' => array('style' => 'background-color: #d24146;'),
    '#suffix' => t('or !cancel', array('!cancel' => l(t('Cancel'), 'admin/track_record/athletes/' . $record['athlete_id'])))
  );

  return $form;
}


function track_record_update_athlete_record_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  if ($values['op'] == t('Update')) {
    if ($values['medal'] != '') {
      db_query("UPDATE {track_record_athlete_records} SET title = '%s', medal = %d WHERE id = %d", $values['title'], $values['medal'], $values['record']);
    }
    else {
      db_query("UPDATE {track_record_athlete_records} SET title = '%s', medal = NULL WHERE id = %d", $values['title'], $values['record']);
    }
  }
  else {
    db_query("DELETE FROM {track_record_athlete_records} WHERE id = %d", $values['record']);
  }

  drupal_set_message(t('Athlete record was updated'));

  $form_state['redirect'] = 'admin/track_record/athletes/' . $values['athlete_id'];

  cache_clear_all();
}
