


<?php if ($this->session->has_userdata('pesan')) { ?> 

<div class="alert alert-success alert-dismissible col-md-11">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Oke!</h4><?=strip_tags(str_replace('</p>','',$this->session->flashdata('pesan')));?>
</div>

<?php } ?>



<?php if ($this->session->has_userdata('error')) { ?> 
<div class="alert alert-error alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>perhatian!</h4><?=strip_tags(str_replace('</p>','',$this->session->flashdata('error')));?>
</div>
<?php } ?>



