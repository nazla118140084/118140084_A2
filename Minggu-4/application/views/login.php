<?php echo doctype('html5'); ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Login Data</title>
  </head>
  <body>

    <h2>Login</h2>
    
    <?php

        validation_errors();

        $username = array(
            'name'            => 'username',
            'type'            => 'text',
            'value'           => "",
            'placeholder'     => 'Username',
        );

        $password = array(
            'name'            => 'password',
            'type'            => 'password',
            'placeholder'     => 'Password',
            'value'           => "",
        );

        $submit = array(
            'name'            => 'insertusers',
            'type'            => 'submit',
            'value'           => 'Login Data',
            'placeholder'     => '',
        );

        echo  form_open_multipart('home/loginProses');

          echo form_label('Username');
            echo br(1);
          echo form_input($username);
          echo  form_error('username');
            echo  br(2);


          echo form_label('Password');
            echo br(1);
          echo form_input($password);
          echo  form_error('password');
            echo  br(2);

          echo  form_submit($submit);
            echo br(2);

        echo form_close();

        if ($this->session->flashdata('sukses_insert_users') <> '') {
          echo $this->session->flashdata('sukses_insert_users');
        }

     ?>

  </body>
</html>
