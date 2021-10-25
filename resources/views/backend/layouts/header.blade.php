<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel-blog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.css">
  
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admin/plugins/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/notify/notify.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert/sweet-alert.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplesnackbarjs@1.0.0/dist/simpleSnackbar.min.css">
  <link rel="stylesheet" href="{{ asset('admin/plugins/nice-select/nice-select.css') }}">
  
  
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admin/admin.css') }}">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- content-wrapper is in sidebar.blade.php -->