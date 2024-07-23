<!-- 
 
This is a OQRS widget to place in your QRZ.com Bio or somewhere else. 

To use this widget insert this Element:

<iframe name="iframe" src="[YOUR WAVELOG URL]/widgets/oqrs/[PUBLIC SLUG]" height="240" width="640" frameborder="0" align="top"></iframe> -->


<!DOCTYPE html>
<html lang="<?php echo $language['code']; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/darkly/overrides.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/general.css">

    <title><?= __("Wavelog OQRS"); ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .widget {
            background-color: #222222;
            color: white;
            display: flex;
        }

        .left-column {
            width: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #444;
            padding: 10px;
        }

        .right-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }

        .top-right {
            height: 60px;
            display: flex;
        }

        .top-right,
        .bottom-right {
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid #444;
            padding: 10px;
        }

        .bottom-right {
            flex: 1;
            border-bottom: none;
        }

        .headerLogo {
            width: 150px;
            height: 150px;
        }

        #oqrs_callsign {
            background-color: #343434;
            border-color: #757575 !important;
        }
    </style>
</head>

<body>
    <div class="widget">
        <div class="left-column">
            <a href="<?php echo (site_url() . '/visitor/' . $slug); ?>" target="_blank"><img class="headerLogo" src="<?php echo base_url(); ?>assets/logo/<?php echo $this->optionslib->get_logo('header_logo'); ?>.png" alt="Logo" /></a>
        </div>
        <div class="right-column">
            <div class="top-right">
                <h3><?= __("Wavelog OQRS Request"); ?></h3>
            </div>
            <div class="bottom-right mt-3">
                <p><?= sprintf(__("Request a QSL card for your QSO with %s."), $user_callsign); ?></p>
                <form action="<?php echo site_url() . '/oqrs/get_qsos_grouped'; ?>" method="POST" target="_blank">
                    <div class="row g-3 align-items-center mt-3 d-flex">
                        <div class="col-auto">
                            <label for="oqrs_callsign" class="col-form-label"><?= __("Your Callsign:"); ?></label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="callsign" id="oqrs_callsign" class="form-control form-control-sm border">
                        </div>
                        <div class="col-auto">
                            <input type="hidden" name="widget" value="true">
                            <button type="submit" class="btn btn-sm btn-primary"><?= __("Submit Request"); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>