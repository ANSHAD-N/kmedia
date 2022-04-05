@extends('news.admin_layout')
@section('content')
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  </style>
<div class="container">
  <form action="submitad" method="post" id="upload_form" enctype="multipart/form-data">
   @csrf 
  
    
    <label for="adurl">Ad Url</label>
    <textarea id="adurl" name="adurl" placeholder="Write Ad destination.." style="height:200px"></textarea>
    
    <input type="file" id="adthumbnail" name="adthumbnail"  >
    
    <br><br>
    <input type="submit" class="btn btn-success"  value="Submit">
  </form>
               
@endsection