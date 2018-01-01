<?php

return [
    'common' => [
        'whoops' => 'Whoops!',
        'error' => 'An error occured while trying to process this request.',
        'offline' => 'Offline',
        'online' => 'Online',
        'stopping' => 'Stopping',
        'starting' => 'Starting',
    ],
    '2fa' => [
        'submit' => 'Submit',
        'enabled' => '2-Factor Authentication has been enabled on your account. Press \'Close\' below to reload the page.',
        'invalid_token' => 'The token provided was invalid.',
        'error' => 'There was an error while attempting to enable 2-Factor Authentication on this account.',
    ],
    'console' => [
        'cpu_label' => 'Percent Use',
        'cpu_text' => 'CPU Usage (as Percent Total)',
        'memory_label' => 'Memory Use',
        'memory_text' => 'Memory Usage (in Megabytes)',
    ],
    'file_editor' => [
        'create_empty' => 'No filename was passed.',
        'create_message' => 'Creating File',
        'create_button' => 'Create File',
        'save_message' => 'Saving File',
        'save_success' => 'File was successfully saved.',
        'save_button' => 'Save File',
    ],
    'actions' => [
        'create_folder_title' => 'Create Folder',
        'create_folder_text' => 'Please enter the path and folder name below.',
        'move_file_title' => 'Move File',
        'move_file_text' => 'Please enter the new path for the file below.',
        'copy_file_title' => 'Copy File',
        'copy_file_text' => 'Please enter the new path for the copied file below.',
        'copy_file_success' => 'File successfully copied.',
        'delete_file_text1' => 'Are you sure you want to delete ',
        'delete_file_text2' => '? There is <strong>no</strong> reversing this action.',
        'delete_file_success' => 'File(s) Deleted',
        'delete_selected_select' => 'Please select files/folders to delete.',
        'decompress_file_title' => 'Decompressing...',
        'decompress_file_text' => 'This might take a few seconds to complete.',
    ],
    'contextmenu' => [
        'rename' => 'Rename',
        'move' => 'Move',
        'copy' => 'Copy',
        'compress' => 'Compress',
        'decompress' => 'Decompress',
        'new_file' => 'New File',
        'new_folder' => 'New Folder',
        'download' => 'Download',
        'delete' => 'Delete',
    ],
    'upload' => [
        'in_progress' => 'A file upload in in progress, are you sure you want to continue?',
        'error' => 'An error was encountered while attempting to upload this file',
    ],
    'server_socket' => [
        'connection_problem' => 'There was an error attempting to establish a WebSocket connection to the Daemon. This panel will not work as expected.',
    ],
    'serverlist' => [
        'error' => 'Error',
        'installing' => 'Installing',
        'suspended' => 'Suspended',
    ],
    'task_view' => [
        'task_limit_reached_title' => 'Task Limit Reached',
        'task_limit_reached_text' => 'You may only assign a maximum of 5 tasks to one schedule.',
    ],
    'task_manage' => [
        'delete_title' => 'Delete Schedule?',
        'delete_text' => 'Are you sure you want to delete this schedule? There is no undo.',
        'delete_button' => 'Delete Schedule',
        'delete_success' => 'Schedule has been deleted.',
        'delete_fail' => 'An error occured while attempting to delete this schedule.',
        'toggle_title' => 'Toggle Schedule',
        'toggle_text' => 'This will toggle the selected schedule.',
        'toggle_button' => 'Continue',
        'toggle_success' => 'Schedule has been toggled.',
        'toggle_fail' => 'An error occured while attempting to toggle this schedule.',
    ],
];