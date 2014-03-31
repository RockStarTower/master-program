<?php
// Plugin with update info
$packages['boo-content-upload'] = array( //Replace plugin with the plugin slug that updates will be checking for
    'versions' => array(
        '1.1' => array( //Array name should be set to current version of update
            'version' => '1.1', //Current version available
            'date' => '2014-02-18', //Date version was released
            'author' => 'Ricky Roller', //Author name - can be linked using html - <a href="http://link-to-site.com">Author Name</a>
            'requires' => '2.8', // WP version required for plugin
            'tested' => '3.8.1', // WP version tested with
            'homepage' => 'http://rickjames.org', // Site devoted to your plugin if available
            'downloaded' => '1000', // Number of times downloaded
            'external' => '', // Unused
            //plugin.zip is the same as file_name
            'package' => 'http://http://66.147.244.85/~ecoabsor/Master_Project/wireframe_forms/plugins/api/download.php?key=' . md5('boo-content-upload.zip' . mktime(0,0,0,date("m"),date("d"),date("Y"))),
            //file_name is the name of the file in the update folder.
            'file_name' => 'boo-content-upload.zip',
            'sections' => array(
                /* Plugin Info sections tabs.  Each key will be used as the title of the tab, value is the contents of tab.
                  Must be lowercase to function properly
                  HTML can be used in all sections below for formating.  Must be properly escaped ie a single quote would have to be \'
                  Screenshot section must use exteranl links for img tags.
                 */
                'description' => 'Description of Plugin', //Description Tab
                'installation' => 'Install Info', //Installaion Tab
                'screen shots' => 'Screen Shots', //Screen Shots
                'change log' => 'Change log', //Change Log Tab
                'faq' => 'FAQ', //FAQ Tab
                'other notes' => 'Other Notes'    //Other Notes Tab
            )
        )
    ),
    'info' => array(
        'url' => 'http://rickjames.org'  // Site devoted to your plugin if available
    )
);