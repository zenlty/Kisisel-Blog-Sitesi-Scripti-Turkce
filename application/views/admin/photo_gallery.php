<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Yeni Fotoğraf Ekle</h3>
                <br>
                <small>Bu pencerede yeni fotoğraf ekleyebilirsiniz</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/add-image-post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Başlık</label>
                    <input type="text" class="form-control"
                           name="title" id="title" placeholder="Resim Başlığınız"
                           value="<?php echo old('title'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Bir kategori seçiniz</option>
                        <?php foreach ($categories as $item): ?>
                            <?php if ($item->id == old('category_id')): ?>
                                <option value="<?php echo html_escape($item->id); ?>" selected>
                                    <?php echo html_escape($item->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Resim</label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Resim Seç
                                    <input type="file" id="Multifileupload" name="file" size="40" class="uploadFile"
                                           accept=".png, .jpg, .jpeg, .gif" required>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div id="MultidvPreview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Resim Ekle</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>


<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Fotoğraf Galerisi</h3>
            <br>
            <small class="pull-left">Görüntüleri buradan görebilirsiniz.</small>

        </div>
    </div><!-- /.box-header -->


    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20">Numara</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Tarih</th>
                            <th class="max-width-120">Ayarlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($images as $item):?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td>
                                <img src="<?php echo base_url().html_escape($item->path_small); ?>" alt="" width="200" class="img-responsive">
                            </td>
                            <td><?php echo html_escape($item->title); ?></td>
                            <td>
                                <?php echo html_escape($item->category_name); ?>
                            </td>
                            <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                            <td>
                                <!-- form delete image -->
                                <?php echo form_open('admin/delete-image-post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle btn-select-option" type="button"
                                                data-toggle="dropdown">Bir işlem seçiniz
                                            <span class="caret"></span></button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this image?');">
                                                        <i class="fa fa-trash i-delete"></i>Sil
                                                    </button>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                <?php echo form_close(); ?><!-- form end -->

                            </td>
                        </tr>

                    <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
