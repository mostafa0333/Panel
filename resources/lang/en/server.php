<?php

return [
    'index' => [
        'title' => 'Viewing Server :name',
        'header' => 'Server Console',
        'header_sub' => 'Control your server in real time.',
        'start' => 'Start',
        'restart' => 'Restart',
        'stop' => 'Stop',
        'kill' => 'Kill',
        'memory_usage' => 'Memory Usage',
        'cpu_usage' => 'CPU Usage',
        'console' => 'Console',
    ],
    'schedule' => [
        'header' => 'Schedule Manager',
        'header_sub' => 'Manage all of this server\'s schedules in one place.',
        'current' => 'Current Schedules',
        'new' => [
            'header' => 'Create New Schedule',
            'header_sub' => 'Create a new set of scheduled tasks for this server.',
            'submit' => 'Create Schedule',
        ],
        'manage' => [
            'header' => 'Manage Schedule',
            'submit' => 'Update Schedule',
            'delete' => 'Delete Schedule',
        ],
        'task' => [
            'time' => 'After',
            'action' => 'Perform Action',
            'payload' => 'With Payload',
            'add_more' => 'Add Another Task',
        ],
        'actions' => [
            'command' => 'Send Command',
            'power' => 'Power Action',
        ],
        'unnamed' => 'Unnamed Schedule',
        'setup' => 'Schedule Setup',
        'day_of_week' => 'Day of Week',
        'day_of_month' => 'Day of Month',
        'hour' => 'Hour of Day',
        'minute' => 'Minute of Hour',
        'time_help' => 'The schedule system supports the use of Cronjob syntax when defining when tasks should begin running. Use the fields above to specify when these tasks should begin running or select options from the multiple select menus.',
        'task_help' => 'Times for tasks are relative to the previously defined task. Each schedule may have no more than 5 tasks assigned to it and tasks may not be scheduled more than 15 minutes apart.',
        'task_created' => 'Successfully created a new task on the Panel.',
        'task_updated' => 'Task has successfully been updated. Any currently queued task actions will be cancelled and run again at the next defined time.',
        'toggle' => 'Toggle Status',
    ],
    'users' => [
        'header' => 'Manage Users',
        'header_sub' => 'Control who can access your server.',
        'configure' => 'Configure Permissions',
        'list' => 'Accounts with Access',
        'add' => 'Add New Subuser',
        'update' => 'Update Subuser',
        'user_assigned' => 'Successfully assigned a new subuser to this server.',
        'user_updated' => 'Successfully updated permissions.',
        'edit' => [
            'header' => 'Edit Subuser',
            'header_sub' => 'Modify user\'s access to server.',
        ],
        'new' => [
            'header' => 'Add New User',
            'header_sub' => 'Add a new user with permissions to this server.',
            'email' => 'Email Address',
            'email_help' => 'Enter the email address for the user you wish to invite to manage this server.',
            'power_header' => 'Power Management',
            'file_header' => 'File Management',
            'subuser_header' => 'Subuser Management',
            'server_header' => 'Server Management',
            'task_header' => 'Schedule Management',
            'sftp_header' => 'SFTP Management',
            'database_header' => 'Database Management',
            'power_start' => [
                'title' => 'Start Server',
                'description' => 'Allows user to start the server.',
            ],
            'power_stop' => [
                'title' => 'Stop Server',
                'description' => 'Allows user to stop the server.',
            ],
            'power_restart' => [
                'title' => 'Restart Server',
                'description' => 'Allows user to restart the server.',
            ],
            'power_kill' => [
                'title' => 'Kill Server',
                'description' => 'Allows user to kill the server process.',
            ],
            'send_command' => [
                'title' => 'Send Console Command',
                'description' => 'Allows sending a command from the console. If the user does not have stop or restart permissions they cannot send the application\'s stop command.',
            ],
            'list_files' => [
                'title' => 'List Files',
                'description' => 'Allows user to list all files and folders on the server but not view file contents.',
            ],
            'edit_files' => [
                'title' => 'Edit Files',
                'description' => 'Allows user to open a file for viewing only.',
            ],
            'save_files' => [
                'title' => 'Save Files',
                'description' => 'Allows user to save modified file contents.',
            ],
            'move_files' => [
                'title' => 'Rename & Move Files',
                'description' => 'Allows user to move and rename files and folders on the filesystem.',
            ],
            'copy_files' => [
                'title' => 'Copy Files',
                'description' => 'Allows user to copy files and folders on the filesystem.',
            ],
            'compress_files' => [
                'title' => 'Compress Files',
                'description' => 'Allows user to make archives of files and folders on the system.',
            ],
            'decompress_files' => [
                'title' => 'Decompress Files',
                'description' => 'Allows user to decompress .zip and .tar(.gz) archives.',
            ],
            'create_files' => [
                'title' => 'Create Files',
                'description' => 'Allows user to create a new file within the panel.',
            ],
            'upload_files' => [
                'title' => 'Upload Files',
                'description' => 'Allows user to upload files through the file manager.',
            ],
            'delete_files' => [
                'title' => 'Delete Files',
                'description' => 'Allows user to delete files from the system.',
            ],
            'download_files' => [
                'title' => 'Download Files',
                'description' => 'Allows user to download files. If a user is given this permission they can download and view file contents even if that permission is not assigned on the panel.',
            ],
            'list_subusers' => [
                'title' => 'List Subusers',
                'description' => 'Allows user to view a listing of all subusers assigned to the server.',
            ],
            'view_subuser' => [
                'title' => 'View Subuser',
                'description' => 'Allows user to view permissions assigned to subusers.',
            ],
            'edit_subuser' => [
                'title' => 'Edit Subuser',
                'description' => 'Allows a user to edit permissions assigned to other subusers.',
            ],
            'create_subuser' => [
                'title' => 'Create Subuser',
                'description' => 'Allows user to create additional subusers on the server.',
            ],
            'delete_subuser' => [
                'title' => 'Delete Subuser',
                'description' => 'Allows a user to delete other subusers on the server.',
            ],
            'view_allocations' => [
                'title' => 'View Allocations',
                'description' => 'Allows user to view all of the IPs and ports assigned to a server.',
            ],
            'edit_allocation' => [
                'title' => 'Edit Default Connection',
                'description' => 'Allows user to change the default connection allocation to use for a server.',
            ],
            'view_startup' => [
                'title' => 'View Startup Command',
                'description' => 'Allows user to view the startup command and associated variables for a server.',
            ],
            'edit_startup' => [
                'title' => 'Edit Startup Command',
                'description' => 'Allows a user to modify startup variables for a server.',
            ],
            'list_schedules' => [
                'title' => 'List Schedules',
                'description' => 'Allows a user to list all schedules (enabled and disabled)  for this server.',
            ],
            'view_schedule' => [
                'title' => 'View Schedule',
                'description' => 'Allows a user to view a specific schedule\'s details including all of the assigned tasks.',
            ],
            'toggle_schedule' => [
                'title' => 'Toggle Schedule',
                'description' => 'Allows a user to toggle a schedule to be active or inactive.',
            ],
            'queue_schedule' => [
                'title' => 'Queue Schedule',
                'description' => 'Allows a user to queue a schedule to run it\'s tasks on the next process cycle.',
            ],
            'edit_schedule' => [
                'title' => 'Edit Schedule',
                'description' => 'Allows a user to edit a schedule including all of the schedule\'s tasks. This will allow the user to remove individual tasks, but not delete the schedule itself.',
            ],
            'create_schedule' => [
                'title' => 'Create Schedule',
                'description' => 'Allows a user to create a new schedule.',
            ],
            'delete_schedule' => [
                'title' => 'Delete Schedule',
                'description' => 'Allows a user to delete a schedule from the server.',
            ],
            'view_sftp' => [
                'title' => 'View SFTP Details',
                'description' => 'Allows user to view the server\'s SFTP information but not the password.',
            ],
            'view_sftp_password' => [
                'title' => 'View SFTP Password',
                'description' => 'Allows user to view the SFTP password for the server.',
            ],
            'reset_sftp' => [
                'title' => 'Reset SFTP Password',
                'description' => 'Allows user to change the SFTP password for the server.',
            ],
            'view_databases' => [
                'title' => 'View Database Details',
                'description' => 'Allows user to view all databases associated with this server including the usernames and passwords for the databases.',
            ],
            'reset_db_password' => [
                'title' => 'Reset Database Password',
                'description' => 'Allows a user to reset passwords for databases.',
            ],
        ],
        'delete' => [
            'title' => 'Delete Subuser',
            'text' => 'This will immediately remove this user from this server and revoke all permissions.',
            'success' => 'Subuser was successfully deleted.',
        ],
    ],
    'files' => [
        'exceptions' => [
            'invalid_mime' => 'This type of file cannot be edited via the Panel\'s built-in editor.',
            'max_size' => 'This file is too large to edit via the Panel\'s built-in editor.',
        ],
        'header' => 'File Manager',
        'header_sub' => 'Manage all of your files directly from the web.',
        'loading' => 'Loading initial file structure, this could take a few seconds.',
        'path' => 'When configuring any file paths in your server plugins or settings you should use :path as your base path. The maximum size for web-based file uploads to this node is :size.',
        'seconds_ago' => 'seconds ago',
        'file_name' => 'File Name',
        'size' => 'Size',
        'last_modified' => 'Last Modified',
        'add_new' => 'Add New File',
        'add_folder' => 'Add New Folder',
        'mass_actions' => 'Mass actions',
        'delete' => 'Delete',
        'edit' => [
            'header' => 'Edit File',
            'header_sub' => 'Make modifications to a file from the web.',
            'save' => 'Save File',
            'return' => 'Return to File Manager',
        ],
        'add' => [
            'header' => 'New File',
            'header_sub' => 'Create a new file on your server.',
            'name' => 'File Name',
            'create' => 'Create File',
        ],
    ],
    'config' => [
        'startup' => [
            'header' => 'Start Configuration',
            'header_sub' => 'Control server startup arguments.',
            'command' => 'Startup Command',
            'edit_params' => 'Edit Parameters',
            'update' => 'Update Startup Parameters',
            'startup_regex' => 'Input Rules',
            'edited' => 'Startup variables have been successfully edited. They will take effect the next time this server is started.',
        ],
        'sftp' => [
            'header' => 'SFTP Configuration',
            'header_sub' => 'Account details for SFTP connections.',
            'change_pass' => 'Change SFTP Password',
            'details' => 'SFTP Details',
            'conn_addr' => 'Connection Address',
            'warning' => 'The SFTP password is your account password. Ensure that your client is set to use SFTP and not FTP or FTPS for connections, there is a difference between the protocols.',
        ],
        'database' => [
            'header' => 'Databases',
            'header_sub' => 'All databases available for this server.',
            'your_dbs' => 'Configured Databases',
            'host' => 'MySQL Host',
            'reset_password' => 'Reset Password',
            'no_dbs' => 'There are no databases listed for this server.',
            'add_db' => 'Add a new database.',
        ],
        'allocation' => [
            'header' => 'Server Allocations',
            'header_sub' => 'Control the IPs and ports available on this server.',
            'available' => 'Available Allocations',
            'help' => 'Allocation Help',
            'help_text' => 'The list to the left includes all available IPs and ports that are open for your server to use for incoming connections.',
        ],
    ],
    'plugins' => [
        'header' => 'Plugin Management',
        'header_sub' => 'Add/remove and configure your plugins.',
        'load_plugin' => 'Install',
        'unload_plugin' => 'Remove',
        'configure' => 'Settings',
        'list' => 'Plugin List',
        'unload' => [
            'title' => 'Remove Plugin',
            'text' => 'All the plugin files and the configuration will be removed from the server. You will have to configure it from scratch, if you enable the plugin again later.',
            'success' => 'Plugin was successfully removed.',
        ],
        'load' => [
            'title' => 'Install Plugin',
            'text' => 'Are you sure you want to install the plugin?',
            'success' => 'Plugin was successfully installed.',
        ],
        'config' => [
            'header' => 'Plugin Configuration',
            'header_sub' => 'Configure your plugins easily.',
            'save' => 'Save',
            'return' => 'Return to Plugin Management',
        ],
    ],
];
