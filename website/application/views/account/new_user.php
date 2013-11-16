
<script>
function checkPassword() {
var p1 = $("#pass1");
var p2 = $("#pass2");

if (p1.val() == p2.val()) {
            p1.get(0).setCustomValidity("");  // All is well, clear error message
            return true;
        }
        else {
            p1.get(0).setCustomValidity("Passwords do not match");
            return false;
        }
    }
    </script>

    <?php
    $agency = array();
    $agency["Agency"] = "----------- Select Agency -----------";
    $client_type =array();
    $client_type["Type"] = "------------ Select Type ------------"; 
    ?>

<table width="550px" class="outter">
    <tr>
        <td>
            <table class="text" border="0" cellpadding="4" cellspacing="3" width="100%">
                <?php  echo form_open('account/create_new_user'); ?>
                <tr height="40px">
                    <td colspan="2" class="formHeading">Add New User</td>
                </tr>
                <tr>
                    <td colspan="2" class="note" bgcolor="#383838">Field marked with <span style="color:#FF0000">*</span> are compulsory fields
                    </td>
                </tr>
                <tr height="10px">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>Username</td>
                    <td class="formSectionRight" width="68%">
                        <input size="35" maxlength="50" class="input" type="text" name="username" required="required">
                            <?php echo form_error('username'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>First Name</td>
                    <td class="formSectionRight" width="68%">
                        <input size="35" maxlength="50" class="input" type="text" name="first" required="required">
                            <?php echo form_error('first'); ?>
                        </td>
                </tr>
                <tr>
                    <td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>Last Name</td>
                    <td class="formSectionRight" width="68%">
                        <input size="35" maxlength="50" class="input" type="text" name="last" required="required">
                        <?php echo form_error('last'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="formSectionLeft"><span style="color:#FF0000">*</span>E-Mail ID</td>
                    <td class="formSectionRight">
                        <input size="50" maxlength="50" class="input" type="text" name="email" required="required">
                        <?php echo form_error('email'); ?>
                    </td>
                </tr>      
                <tr>
                    <td class="formSectionLeft"><span style="color:#FF0000">*</span>User Type</td>

                    <td class="formSectionRight">
                        <?php
                        $client_type["1"] = "Administrator";
                        $client_type["2"] = "Client";
                        $client_type["3"] = "Front-Desk";

                        $class = "class='input'";

                        echo form_dropdown("type", $client_type, '$user_type', $class);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="formSectionLeft"><span style="color:#FF0000">*</span>Agency</td>
                    <td class="formSectionRight">
                        <?php
                            foreach ($clients as $row):
                                $agency["$row->id"] = "$row->agency";
                            endforeach;

                            $class = "class='input'";

                            echo form_dropdown("agency", $agency, '', $class);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="formSectionLeft"><span style="color:#FF0000">*</span>Password</td>
                    <td class="formSectionRight"><input name="password" size="25" class="input" type="password" required="required">
                        <?php echo form_error('password'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="formSectionLeft"><span style="color:#FF0000">*</span>Re - Enter Password</td>
                    <td class="formSectionLast"><input name="passconf" size="25" class="input" type="password" required="required">
                        <?php echo form_error('passconf'); ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td height="30">
                        <input value="Continue" class="btnbg" type="submit">&nbsp;&nbsp;
                        <input value="Reset" class="btnbg" type="reset">&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                    <?php echo form_close();?>
            </table>
        </td>
    </tr>
</table>


