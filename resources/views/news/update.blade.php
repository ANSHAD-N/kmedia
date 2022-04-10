@extends('news.admin_layout')
@section('content')
<head>

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

  .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 24px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(16px);
    -ms-transform: translateX(16px);
    transform: translateX(16px);
  }

  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
</head>
<body>

<h3>Upload</h3>

<div class="container">
  <form action="submit" method="post" id="upload_form" enctype="multipart/form-data">
   @csrf 
  <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="News Title..">

    <input type="file" id="thumbnail" name="thumbnail"  >
    <br><br>
        <label for="url">Video URL</label>
        <input type="text" id="url" name="url" placeholder="Video url.."> 
        <label for="text_content">Choose News Heading count :</label>
              <select id="text_content" onchange="gen_cont(event)" name="text_content">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <div id="news_text" style="display: none;">
              </div>
    <label for="polling">Polling</label>
    <label class="switch">
      <input id= 'toggle' name="status" type="checkbox" >
      <span class="slider round"></span><br>
      <span id="polling" class="polling"></span>
    </label><br><br>
      <div class="row" id="pollquestion" style="display: none;">
           <label for="polling_question">Polling Question</label> 
            <input type="text" id="polling_question" name="polling_question" placeholder="Enter Polling Question..">
              <label for="polling_option">Choose options count :</label>
              <select id="polling_option" onchange="gen_opt(event)" name="polling_option">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <div id="polling_answers" style="display: none;">
              </div>
      </div> 
      <label for="adurl">Advertisement Url</label>
    <input type="text" id="adurl" name="adurl" placeholder="Advertisement Url..">

    <input type="file" id="adthumbnail" name="adthumbnail"  >
    <br><br>
      
    <input type="submit" class="btn btn-success"  value="Submit">
  </form>
</div>

</body>
<script >
   function gen_cont(event){
    var val1=document.getElementById("text_content").value;
    document.getElementById("news_text").style.display = "block";
    document.getElementById("news_text").innerHTML="";
     for (let i = 0; i < val1 ; i++) {
      var label1 = document.createElement("label");   
        var for_label1 = document.createAttribute("for");       
        for_label1.value = i.toString()+"content_title";  
        label1.setAttributeNode(for_label1);
        var textnode1 = document.createTextNode("content_title "+(i+1).toString()) 
        label1.appendChild(textnode1)            
       var input1 = document.createElement("input");   
        var id_input1 = document.createAttribute("id"); 
        id_input1.value = i.toString()+"content_title";  
        var name_input1 = document.createAttribute("name"); 
        name_input1.value = i.toString()+"content_title"; 
        var type_input1 = document.createAttribute("type");
        type_input1.value ="text";
        var placeholder_input1 = document.createAttribute("placeholder");   
        placeholder_input1.value = "news Heading..";
        input1.setAttributeNode(id_input1);
        input1.setAttributeNode(name_input1);
        input1.setAttributeNode(type_input1);
        input1.setAttributeNode(placeholder_input1);
        document.getElementById("news_text").appendChild(label1);
        document.getElementById("news_text").appendChild(input1);
      var label = document.createElement("label");   
        var for_label = document.createAttribute("for");       
        for_label.value = i.toString()+"content_text";  
        label.setAttributeNode(for_label);
        var textnode = document.createTextNode("content_text "+(i+1).toString()) 
        label.appendChild(textnode)            
       var input = document.createElement("textarea");   
        var id_input = document.createAttribute("id"); 
        id_input.value = i.toString()+"content_text";  
        var name_input = document.createAttribute("name"); 
        name_input.value = i.toString()+"content_text"; 
        var type_input = document.createAttribute("type");
        type_input.value ="text";
        var placeholder_input = document.createAttribute("placeholder");   
        placeholder_input.value = "news Content..";
        input.setAttributeNode(id_input);
        input.setAttributeNode(name_input);
        input.setAttributeNode(type_input);
        input.setAttributeNode(placeholder_input);
        document.getElementById("news_text").appendChild(label);
        document.getElementById("news_text").appendChild(input);     
     }
     
  
   }
</script>
<script >
   function gen_opt(event){
    var val=document.getElementById("polling_option").value;
    document.getElementById("polling_answers").style.display = "block";
    document.getElementById("polling_answers").innerHTML="";
     for (let i = 0; i < val ; i++) {
      var label = document.createElement("label");   
        var for_label = document.createAttribute("for");       
        for_label.value = i.toString()+"op";  
        label.setAttributeNode(for_label);
        var textnode = document.createTextNode("Option "+(i+1).toString()) 
        label.appendChild(textnode)            
       var input = document.createElement("input");   
        var id_input = document.createAttribute("id"); 
        id_input.value = i.toString()+"op";  
        var name_input = document.createAttribute("name"); 
        name_input.value = i.toString()+"op"; 
        var type_input = document.createAttribute("type");
        type_input.value ="text";
        var placeholder_input = document.createAttribute("placeholder");   
        placeholder_input.value = "Polling Answer..";
        input.setAttributeNode(id_input);
        input.setAttributeNode(name_input);
        input.setAttributeNode(type_input);
        input.setAttributeNode(placeholder_input);
        document.getElementById("polling_answers").appendChild(label);
        document.getElementById("polling_answers").appendChild(input);        
     }
  
   }
</script>
<script > 
  $("#toggle").click(function () {
    console.log($(this).val())
    if($(this).val()=="on"){
      $("#pollquestion").show();
      gen_opt({"value" : '2' });
      $(this).val("off");
    }
    else{
      $("#pollquestion").hide();
      $(this).val("on");
    }
  });
</script>


@endsection