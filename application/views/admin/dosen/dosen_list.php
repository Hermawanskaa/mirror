<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('admin/template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Dosen<small>List All </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dosen</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
               <div class="widget-user-header">
                     <div class="row col-md-4 pull-right">
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Dosen (Ctrl+a)" href=""><i class="fa fa-plus-square-o" ></i> Add Dosen</a>
                        <a class="btn btn-flat btn-success" title="export Dosen" href=""><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <a class="btn btn-flat btn-success" title="export pdf Dosen" href=""><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                     </div>
                     
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Dosen</h3>
                     <h5 class="widget-user-desc">List All Dosen<i class="label bg-yellow">items</i></h5>
                  </div>

                  <form name="form_dosen" id="form_dosen" action="">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="btn-flat" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>Id Member</th>
                           <th>Pass</th>
                           <th>Nama</th>
                           <th>Alamat</th>
                           <th>No Hp</th>
                           <th>Email</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_dosen">
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="">
                           </td>

                           <td></td> 
                           <td></td> 
                           <td></td> 
                           <td></td> 
                           <td></td> 
                           <td></td> 
                           <td width="200">
                              <a href="" class="label-default"><i class="fa fa-newspaper-o"></i>View</a>
                              <a href="" class="label-default"><i class="fa fa-edit "></i>Update</a>
                              <a href="" data-href="" class="label-default remove-data"><i class="fa fa-close"></i>Remove</a>
                              
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions">Apply</button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                           <option value="id_member">Id Member</option>
                           <option value="pass">Pass</option>
                           <option value="nama">Nama</option>
                           <option value="alamat">Alamat</option>
                           <option value="no_hp">No Hp</option>
                           <option value="email">Email</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        
                     </div>
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>

