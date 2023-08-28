
<?php 
    include 'app/Views/front/components/handleMsg.php';
?>

<!-- Servicio validacion -->
<?php $validation = \Config\Services::validation(); ?>


        <div class="dashboard">

            <?php 
                include "panelAdmin.php";
            ?>

            <div class="newproduct__wrapper" id="newproduct__wrapper">

                <form class="newproduct__wrapper__form col-12 col-lg-10 col-xl-8 mx-auto d-flex flex-wrap"
                 method="post" action="<?php echo base_url('/admin/edit-product') ?>/<?php echo $shoe['id'] ?>" enctype="multipart/form-data">
                    
                    <h3 class="newproduct__wrapper__form__title col-12">Editar Producto</h3>

                    <div class="form-group col-6">
                        <label for="title">Titulo
                        <?php if ($validation->getError('title')) { ?>
                            <span class='text-danger mx-2' style="font-size: 12px;">
                                <?= $error = $validation->getError('title'); ?>
                            </span>
                        <?php } ?>
                        </label>
                        <input name="title" type="text" class="form-control" placeholder="Ingresar Titulo" value="<?php echo $shoe['title'] ?>">
                    </div>

                    <div class="form-group col-6">
                        <label for="price">Precio
                            <?php if ($validation->getError('price')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('price'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input  name="price" type="number" class="form-control" placeholder="Ingresar Precio"  value="<?php echo $shoe['price'] ?>">
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Marca
                            <?php if ($validation->getError('mark')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('mark'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input  name="mark" type="text" class="form-control" placeholder="Ingresar Marca"  value="<?php echo $shoe['mark'] ?>">
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Gender
                            <?php if ($validation->getError('gender')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('gender'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <select name="gender" class="form-select">
                            <?php foreach($genders as $gender): ?>
                                <?php if ($gender['genderId'] == $shoe['gender']) { ?>
                                    <option  selected value="<?php echo $gender['genderId'] ?>"><?php echo $gender['name'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $gender['genderId'] ?>"><?php echo $gender['name'] ?></option>
                                <?php } ?>        
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Categoria
                            <?php if ($validation->getError('category')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('category'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <select name="category" class="form-select" >
                            <?php foreach($categories as $cate): ?>

                                <?php if ($cate['categoryId'] == $shoe['categoryId']) { ?>
                                    <option  selected value="<?php echo $cate['categoryId'] ?>"><?php echo $cate['name'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $cate['categoryId'] ?>"><?php echo $cate['name'] ?></option>
                                <?php } ?>
                                               
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label for="desciption">Descripcion
                            <?php if ($validation->getError('description')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('description'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <textarea  name="description" type="text" class="form-control w-100" style="max-height: 180px; min-height: 180px" placeholder="Ingresar Descripcion"><?php echo $shoe['description'] ?></textarea>
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Oferta (en %)
                            <?php if ($validation->getError('mark')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('mark'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input  value="<?php echo $shoe['sale'] ?>" name="sale" type="number" class="form-control" placeholder="Porcentaje Descuento (ej: 5, 10)">
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Stock
                            <?php if ($validation->getError('mark')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('mark'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input  value="<?php echo $shoe['stock'] ?>"  name="stock" type="number" class="form-control" placeholder="Stock Disponible">
                    </div>

                    <div class="form-group col-4">
                        <label for="marca">Min Stock
                            <?php if ($validation->getError('minstock')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('minstock'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input  value="<?php echo $shoe['minstock'] ?>"  name="minstock" type="number" class="w-100 form-control" placeholder="Stock Disponible">
                    </div>

                    <div class="form-group col-6">
                    <label for="marca">Sizes (ej: 7.5, 9)
                            <?php if ($validation->getError('sizes')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('sizes'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input value="<?php echo $shoe['sizes'] ?>" name="sizes" type="text" class="w-100 form-control" placeholder="Talles Disponible">
                    </div>

                    <div class="form-group col-6">
                        <label for="marca">Images (png, jpeg, jpg, web & min 2)
                            <?php if ($validation->getError('mark')) { ?>
                                <span class='text-danger mx-2' style="font-size: 12px;">
                                    <?= $error = $validation->getError('mark'); ?>
                                </span>
                            <?php } ?>
                        </label>
                        <input name="images[]" type="file" class="form-control" multiple="multiple">
                    </div>

                    <button type="submit" class="btn btn-warning mt-3 btn-block w-100">Editar Publicación</button>
                </form>

            </div>

        </div>