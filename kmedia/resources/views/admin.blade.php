<x-navigation :navigation="True" :panel="True"/>

<script >
    window.onload= function () {
        
        
        let el = document.getElementById('pagination_data');
        for (let i = 0; i<10; i++) {
            var node = document.createElement("LI");
            var textnode = document.createTextNode(i); 
            node.appendChild(textnode);
            el.appendChild(node);
        }
      
    }
    