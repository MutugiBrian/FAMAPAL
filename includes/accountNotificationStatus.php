<div role="tabpanel" class="tab-pane " id="notifications">
    <div class="col-xs-12 mrg-btm-10">
        <h6 class="stitle">Notifications</h6>
    </div>
    <?php $iUserId = Yii::app()->session['eUserType'] ?>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>CRM Status</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eCRMStatus'] == 'on') {
                                $eCRMStatus = 'true';
                                echo '<input  type="checkbox" id="eCRMStatus"  name="eCRMStatus" value="' . $eCRMStatus . '"  onchange="changeeCRMStatus(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $eCRMStatus = 'false';
                                echo ' <input  type="checkbox" id="eCRMStatus" name="eCRMStatus" value="' . $eCRMStatus . '" onchange="changeeCRMStatus(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>

                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>
        <?php if (Yii::app()->session['eUserType'] == 'euser') { ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Posts by Admin</strong><span class="pull-right">
                        <div class="switch">
                            <label> Off
                                <?php
                                if ($model->contentNotifications[0]['eAdminPost'] == 'on') {
                                    $eAdminPost = 'true';

                                    echo '<input  type="checkbox" id="eAdminPost"  name="eAdminPost" value="' . $eAdminPost . '" onchange="changeeAdminPost(this.value)" checked >
                           <span class="lever"></span>';
                                } else {

                                    $eAdminPost = 'false';
                                    echo ' <input  type="checkbox" id="eCRMStatus" name="eCRMStatus" onchange="changeeAdminPost(this.value)" value="' . $eAdminPost . '">
                   <span class="lever"></span>';
                                }
                                ?>
                                On </label>
                        </div>
                    </span>
                    <div class="clearfix"></div>
                </div>
                <!--<div class="panel-body">Notifications</div>-->
            </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Enterprise service</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eService'] == 'on') {
                                $eService = 'true';

                                echo '<input  type="checkbox" id="eService"  name="eService" value="' . $eService . '" onchange="changeeService(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $eService = 'false';
                                echo ' <input  type="checkbox" id="eService" name="eService" value="' . $eService . '" onchange="changeeService(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>
                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Message</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eMessage'] == 'on') {
                                $eMessage = 'true';

                                echo '<input  type="checkbox" id="eMessage"  name="eMessage" value="' . $eMessage . '" onchange="changeeMessage(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $eMessage = 'false';
                                echo ' <input  type="checkbox" id="eMessage" name="eMessage" onchange="changeeMessage(this.value)" value="' . $eMessage . '">
                   <span class="lever"></span>';
                            }
                            ?>

                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->

        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Confirm Payment</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['ePayment'] == 'on') {
                                $ePayment = 'true';

                                echo '<input  type="checkbox" id="ePayment"  name="ePayment" value="' . $ePayment . '" onchange="changeePayment(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $ePayment = 'false';
                                echo ' <input  type="checkbox" id="ePayment" name="ePayment" value="' . $ePayment . '" onchange="changeePayment(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>

                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Connect/Assign</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eConnect'] == 'on') {
                                $eConnect = 'true';

                                echo '<input  type="checkbox" id="eConnect"  name="eConnect" value="' . $eConnect . '" onchange="changeeConnect(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $eConnect = 'false';
                                echo ' <input  type="checkbox" id="eConnect" name="eConnect" value="' . $eConnect . '" onchange="changeeConnect(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>

                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Group</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eGroup'] == 'on') {
                                $eGroup = 'true';

                                echo '<input  type="checkbox" id="eGroup"  name="eGroup" value="' . $eGroup . '" onchange="changeeGroup(this.value)" checked >
                           <span class="lever"></span>';
                            } else {
                                $eGroup = 'false';
                                echo ' <input  type="checkbox" id="eGroup" name="eGroup" value="' . $eGroup . '" onchange="changeeGroup(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>

                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Posts by Favourite</strong><span class="pull-right">
                    <div class="switch">
                        <label> Off
                            <?php
                            if ($model->contentNotifications[0]['eFavourite'] == 'on') {
                                $eFavourite = 'true';

                                echo '<input  type="checkbox" id="eFavourite"  name="eFavourite" value="' . $eFavourite . '" onchange="changeeFavourite(this.value)"  checked >
                           <span class="lever"></span>';
                            } else {
                                $eFavourite = 'false';
                                echo ' <input  type="checkbox" id="eFavourite" name="eFavourite" value="' . $eFavourite . '" onchange="changeeFavourite(this.value)">
                   <span class="lever"></span>';
                            }
                            ?>
                            On </label>
                    </div>
                </span>
                <div class="clearfix"></div>
            </div>
            <!--<div class="panel-body">Notifications</div>-->
        </div>

    </div>
</div>
<script>
    function  changeeCRMStatus(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeCRMStatus',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eCRMStatus': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }


    function  changeeAdminPost(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeAdminPost',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eAdminPost': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }


    function  changeeService(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeService',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eService': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }

    function  changeeMessage(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeMessage',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eMessage': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }

    function  changeePayment(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeePayment',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'ePayment': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }

    function  changeeConnect(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeConnect',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eConnect': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }
    function  changeeGroup(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeGroup',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eGroup': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }
    function  changeeFavourite(value) {
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/contentNotification/changeeFavourite',
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: {'eFavourite': value},
            success: function (result) {
                $("#notifications").load(window.location + " #notifications");
            }
        });
    }
</script>