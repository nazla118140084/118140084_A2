<?php echo doctype('html5'); ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Register Data</title>
  </head>
  <body>


    <?php

        validation_errors();

        $username = array(
            'name'            => 'username',
            'type'            => 'text',
            'value'           => set_value('username'),
            'placeholder'     => 'Username',
        );

        $password = array(
            'name'            => 'password',
            'type'            => 'password',
            'placeholder'     => 'Password',
            'value'           => set_value('password'),
        );

        $email = array(
            'name'            => 'email',
            'type'            => 'email',
            'placeholder'     => 'Email',
            'value'           => set_value('email'),
        );

        $submit = array(
            'name'            => 'insertusers',
            'type'            => 'submit',
            'value'           => 'Tambah Data',
            'placeholder'     => '',
        );

        echo  form_open_multipart('home/registerProcess');

          echo form_label('Username');
            echo br(1);
          echo form_input($username);
          echo  form_error('username');
            echo  br(2);

          echo form_label('Email');
            echo br(1);
          echo form_input($email);
          echo  form_error('email');
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
