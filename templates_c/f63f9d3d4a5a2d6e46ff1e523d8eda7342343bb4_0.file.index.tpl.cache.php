<?php
/* Smarty version 3.1.30, created on 2016-10-12 17:31:23
  from "/home/quinten/Desktop/hf/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fe574b9e44b6_13349322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f63f9d3d4a5a2d6e46ff1e523d8eda7342343bb4' => 
    array (
      0 => '/home/quinten/Desktop/hf/templates/index.tpl',
      1 => 1476286195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57fe574b9e44b6_13349322 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '45571809657fe574b9b5367_83100663';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'index'), 0, false);
?>


<div id="banner">
  <img src="http://www.centrumeenenal.nl/wp-content/uploads/2012/07/blije-mensen.jpg">
</div>

<div class="container">

  <div class="row">
    <div class="col-sm-6 main" id="summary">
      <h3>Wat is Haagse Feiten?</h3>
      <p>Haagse Feiten is een digitale dienst die toegang biedt tot parlementaire informatie die verrijkt wordt met data en informatie uit diverse relevante bronnen. Bronnen zoals:<p>

        <p>Overheidsbronnen <br>
          Nieuwsbronnen;<br>
          Social media-kanalen.
        </p>

        Je hoeft dus nooit meer tientallen websites te bezoeken, want alle relevante informatie wordt in één oogopslag helder en inzichtelijk gepresenteerd door middel van een persoonlijk dashboard.<br>

        Wij richten ons op bedrijven, instellingen, overheden en professionals voor wie de politieke besluitvorming én het proces van invloed zijn op hun business, beleid of praktijk. Haagse Feiten faciliteert om dit reilen en zeilen goed te kunnen monitoren, dan wel te beïnvloeden.<br>

        Haagse Feiten is dé toegangspoort waarachter alle beschikbare overheidsinformatie eenvoudig en snel terug te vinden is.</p>
      </div>


      <div class="col-sm-6 main" id="fom">
        <h3>Feit van de maand!</h3>
        <img src="https://haagsefeiten.nl/wp-content/uploads/2016/05/marcelHenriquez.jpg">
        <p><b>Wist je dat:</b> dit de oprichter is van Haagse Feiten?</p>
      </div>
    </div>
  </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
