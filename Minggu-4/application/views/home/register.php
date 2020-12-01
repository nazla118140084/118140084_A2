<?php echo doctype('html5'); ?>
<html>
<head>
	<title>Register</title>
</head>
<body>
<div class="center-register">

            <h2>Membuat Akun</h2>
            <div class="border-title"></div>

            <?php
                if($this->session->flashdata('success') <> ''){
                    echo $this->session->flashdata('success');
                    echo br(2);
                } else if($this->session->flashdata('danger') <> ''){
                    echo $this->session->flashdata('danger');
                    echo br(2);
                }
            ?>
            <br>

            <?php

                validation_errors();

                $username = array(
                    'name'            => 'username',
                    'type'            => 'text',
                    'value'           => set_value('username'),
                    'class'           => 'form-login',
                );

                $password = array(
                    'name'            => 'password',
                    'type'            => 'password',
                    'class'           => 'form-login',
                    'value'           => set_value('password'),
                );

                $email = array(
                    'name'            => 'email',
                    'type'            => 'email',
                    'class'           => 'form-login',
                    'value'           => set_value('email'),
                );

                $submit = array(
                    'name'            => 'insertusers',
                    'type'            => 'submit',
                    'value'           => 'Tambah Data',
                    'class'           => 'form-button',
                );

                echo  form_open_multipart('home/registerProcess');

                echo form_label('Username');
                echo br(1);
                echo form_input($username);
                echo form_error('username');
                echo br(2);

                echo form_label('Email');
                echo br(1);
                echo form_input($email);
                echo form_error('email');
                echo br(2);

                echo form_label('Password');
                echo br(1);
                echo form_input($password);
                echo form_error('password');
                echo br(2);

                echo form_submit($submit);
                echo br(2);

                echo form_close();

                if ($this->session->flashdata('sukses_insert_users') <> '') {
                echo $this->session->flashdata('sukses_insert_users');
                }

            ?>

            <?php echo anchor('home/', 'Login', ['class' => 'register']); ?>	
        </div>
</body>
</html>