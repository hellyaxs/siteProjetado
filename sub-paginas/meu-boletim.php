<?php header('Content-type:text/css'); ?>
*{
    margin: 0;
    padding: 0;
    border: 0;
    outline: none;
    font-family: Josefin Sans,sans-serif;
}

section{

    width: 100%;
    text-align: center;

}

input[type="checkbox"]{
    display:none;
}
label[for="bt_menu"]{
    padding: 5px;
    background-color: rgb(43, 10, 233);
    color: #fff;
    font-family: "Arial";
    text-align: center;
    font-size: 30px;
    cursor: pointer;
    height: 50px;
    display:none;
}
@media(max-width:800px){
    label[for="bt_menu"]{
        display:block;
    }
    .menu nav{
        margin-top: 0px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        height: fit-content;
        background-color: darkblue;
        transition: all 0.4s;
    }
    #bt_menu:checked ~ ul li{
        display:list-item;
        margin-bottom: 20px;

    }
    .menu a{
        background-color: darkblue;
        display: block;
        padding: 20px;
        height: auto;
        z-index: 1;
       
    }
    
    #bt_menu:checked ~
section#menu{
    margin-left: -100%;
    transition: all 0.4s;;
    position: fixed;
   

 }
 .menu section{
    transition: all 0.4s;;
     margin:0;
     height: 250px;
    
 }
 .menu img[alt="logo-do-site"]{
       display: none;
 }
}
nav{
    
    margin-top: 10px;
    background-color: rgb(30, 27, 221);
    width: 100%;
    height: 30px;
    padding-top: 20px;
    padding-bottom: 5px;

}
.menu > nav > ul > a > li{
    display:inline-flex;
    flex-wrap: wrap;
    color: azure;
    list-style: none;
    align-items: center;
    text-decoration: none;
    margin-left: 10px;
}
.boletim
{
    display: flex;
    overflow:hidden;
    margin: 70px auto;
    width: 93%;
    height: 70%;
    border-radius: 30px;
}
a{
    text-decoration: none;
    color: rgb(247, 247, 247);
    padding:10px;
}
a:hover{
    color: tomato;
    cursor:pointer;
}
a#prof{
    color: tomato;
}
h1{
    margin-bottom: 10px;
    margin-top: 5px;
    align-items: center;
    color: rgb(67, 54, 251);
    font-size: 3.4em;
    text-align: center;

}
ul#bimestre {
    border-bottom: solid 1px rgb(255, 255, 255);
    display: block;
    margin-top: 15px;
}
.bimestre li{
   
   border-top: solid 0.5pt rgb(252, 254, 255);
   margin-bottom: 7px;
   list-style: none;
   padding: 20px 3px;
   display:inline-block;
   width: 90%;

}
.materias{
  
    display:inline-block;
    list-style: none;

}
.materias > li{
     display: inline-block;
     margin-right: 10px;
     border-right: solid 1px tomato;
}
div#bimestre{
    width:20%;
    background-color: rgba(69, 117, 248, 0.801);
    border-radius: 30px 0px 0px 30px;
    

  
}
div#icon{
    position: relative;
    top: 7px;
    
    display:inline-block;
}
input{
    padding: 12px;
    margin: 10px auto;
    width: 60%;
    height: 30px;
    border-radius: 15px;
    display: flex;
    border-bottom: solid blue 2px;
    
}
input[type=file]{
    width: 60%;
    margin: 0px auto;
    height: 15px;
    display: flex;
    flex-wrap: wrap;
    border-bottom: none;
    
}
table{ 
    height:300px;
    overflow:auto;
    padding:5px;
    margin:0 auto;

}
td{

    height:auto;
    overflow:auto;
    border:solid blue 1px;
    padding:9px;
}
button{
    width:40%;
    color: white;
    text-align: center;
    font-size: 1.3em;
    border-radius: 30px;
    background-color: blue;
    padding:  18px 30px;
    cursor: pointer;
}
button:hover{
    background-color: rgba(0, 0, 255, 0.74);
}
button#prof{
    width:100%;
color: white;
text-align: center;
font-size: 1.3em;
border-radius: 0px;
background-color: blue;
padding:  8px 16px;
cursor: pointer;
}

select{
    width: 25%;
    height: 40px;
    color: tomato;
    font-size:1.3em;
    border-radius:10px;
    margin-bottom:14px;
    border-bottom:solid 2px blue;

}
div#notas{
    text-align: center;
    background-color: rgb(223, 227, 238);
    border: solid 0.5pt white;
    width: 80%;

    border-radius: 0px 30px 30px 0px;
}

footer{
    background-color: rgb(30, 27, 221);
    width: 100%;
    text-align: center;
    padding-top: 7px;
    padding-bottom: 7px;
    color: white;
    
}
div#voltar{
    margin-top:15px ;
    margin-left: 25%;
    width: 100px;
    height: 120px;
    overflow: hidden;
}
p{
    margin-left: 35%;
    color: white;
}
img#user{

    width: 100%;
    height: 90%;
    border-radius: 50px;
}
img#user:hover{
    opacity: 0.5;
    background-color: thistle;
}
img{
    margin-right:3px;
}
.anos > div{

    display:felx;
    background-color:tomato;
    padding: 5px 60px 10px 15px;
    border-radius:30px;
    width:40px;
    height:18px;
    margin-bottom:7px;
    cursor:pointer;
    color:white;

}
.anos{
    margin-top:18%;
    width:44px;
    position:absolute;
}