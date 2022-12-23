These are variables to use in your template:

<?php echo $template_username; ?>      - Username of the logged in person
<?php echo $template_homelink; ?>      - Link to Home
<?php echo $template_admlink; ?>       - Administration Link (includes a <br> afterwords)
<?php echo $template_logoutlink; ?>    - Logout Link


.::REQUIRED::.
<?php include ($body); ?>             - This is where all the content goes
<?php echo $template_zcopy; ?>   - ZPanel Copyright



.::User Information::.

Using
<?php echo $row_Recordset1['__']; ?>

Replace __ with any of the following to display what you want.

servicename    - their username
name           - their name
Rank           - Admin/User/Rep/Power User
email          - their registered e-mail address
adminemail     - emails that can make changes to their account (seperated by commas)
address        - their registered street address
  city           - their city
  state          - their state
  zip            - their zip
phone          - their registered phone number
webservice     - the current web hosting package
status         - Active/Suspended/Marked for Deletion
homedir        - their home directory (c:/blah/blah)
url            - their web address