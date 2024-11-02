# How to use the package.

This package can display the latest job announcements from PHPClasses.

Creates a formatted table in frame style, showing the latest job announcements published on the PHP Classes website.

You can easily embed it into any code as long as you follow the instructions mentioned below in the details.

Unfortunately, the configuration in config.php has to be done manually, unless you create code that makes it more organized and automatic, as is the case when we create modules for cms.


## Installation

Install the package in any folder within your Web page, as long as you include the following code in the HTML BODY, where you want it to appear.

```
    <div class="efp-template">
        <?php require_once([PATH]/'phpclasses-jobs.php'); ?>
    </div>
```

You should also make sure that the following are included in the HTML HEAD:

```
    <link rel="stylesheet" href="assets/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/main.css" type="text/css" />
    <script type="text/javascript" src="assets/js/jquery.js" charset="UTF-8"></script> 
```

## Configure the package
````
    libs/config.php
````

- Change the presets according to your needs.

```
        'lang'          => 'en',        // Current Language of package
        'show_title'    => true,        // Show Title in block element.
        'count'         => 10,			// How many jobs will be displayed.
        'show_summary'	=> true,		// Show Summary Description
        'show_days'	    => true,		// Show Days
        'theme'         => 'cleargray'	// The Block theme
```  

Now you can run it either through another cms, or as a standalone one, like the example that came with the package.

--- 

An online demo can be viewed [HERE](https://demo.ascoos.com/tests/phpclasses-jobs/)
