{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=Zoeken}

<center>
<div style="width:100%;height:100%position:relative;left:50%;">
  <input type="text" onchange="search()">
</div>
</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function search(){
$.get("php/zoeken.php", function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
});
}
</script>

{include file="footer.tpl"}
