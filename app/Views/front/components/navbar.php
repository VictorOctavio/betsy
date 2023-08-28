<?php
   $session = session();
   $cart =\Config\Services::cart();
   $cart = $cart->contents();
?>

<nav class="navbar" id="navbar">
        <div class="navbar__wrapper container">
    
            <div class="navbar__wrapper__principal">
                <a id="logotype"  class="navbar__wrapper__logotype">
                    <img src="<?php echo base_url('assets/images/logotype.png') ?>" alt="logotype"/>
                </a>
    
                <ul class="navbar__wrapper__items">
                    <a href="<?php echo base_url('products');?>" class="navbar__wrapper__items__item">Descubre</a>
                    <a href="<?php echo base_url('nosotros');?>" class="navbar__wrapper__items__item">Nosotros</a>

                <?php if(session()->get('logged_in')) {; ?>
                        <div class='dropdown'>
                                <button class='btn dropdown-toggle text-white' style="postion: relative" type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person-circle'></i>

                                    <?php if(count($cart) > 0) {; ?>
                                            <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger" style="margin-top: 10px">
                                                <?php echo  count($cart); ?>
                                            </span>
                                    <?php } ?>              
                                </button>
                                <ul class='dropdown-menu'>
                                
                                    <?php if(!session()->get('isAdmin')) {; ?>
                                        <li class='dropdown-item' id='btn-cart'><i class='bi bi-cart-fill'></i> 
                                        Carrito                      
                                    </li>
                                    <?php } ?>

                                   
                                    <a href='<?php echo base_url('user') ?>' class='dropdown-item' id='btn-cart'><i class='bi bi-person-lines-fill'></i> Mi Cuenta</a>
                                   

                                    <?php if(session()->get('isAdmin')) {; ?>
                                        <a href='<?php echo base_url('admin') ?>' class='dropdown-item' ><i class='bi bi-person-fill-lock'></i> Admin</a>
                                    <?php } ?>
                                    <?php if(!session()->get('isAdmin')) {; ?>
                                        <a href='<?php echo base_url('user/messages') ?>' class='dropdown-item' ><i class="bi bi-chat-square-text-fill"></i> Messages</a>
                                    <?php } ?>
                                    <?php if(!session()->get('isAdmin')) {; ?>
                                        <a href='<?php echo base_url('user/my-buys') ?>' class='dropdown-item' ><i class="bi bi-clock-history"></i> Historial</a>
                                    <?php } ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <a class='dropdown-item' href='<?php echo base_url('logout') ?>'><i class="bi bi-box-arrow-left"></i> Logout</a>
                                </ul>
                            </div>
                    <?php } else { ?> 
                        <a href='<?php echo base_url('signin');?>' class='navbar__wrapper__items__item' style='color:crimson;'>INGRESAR</a>
                <?php } ?>
                </ul>
            </div>
    
            <div class="navbar__wrapper__secondary " id="navbarSecondary" >
                    
           
                        
                <div class="navbar__wrapper__secondary__contain container">

                <a href="<?php echo base_url('') ?>"  class="navbar__wrapper__secondary__contain__btnCategories"><i class="bi bi-arrow-left-short"></i> volver</a>

                    <div class="contain__sections">
                        <h3 class="contain__sections__title">Secciones</h3>
                        <ul class="contain__sections__list">
                            <li class="contain__sections__list__item">Ofertas 🔥</li>
                            <li class="contain__sections__list__item">Zapatillas</li>
                            <li class="contain__sections__list__item">Eventos</li>
                            <li class="contain__sections__list__item">Edicioens Limitadas</li>
                        </ul>
                    </div>
    
                    <div class="contain__sections categories">
                        <div>
                            <h3 class="contain__sections__title contain__sections__title--category">Niño</h3>
                            <ul class="contain__sections__list">
                                <li class="contain__sections__list__item">Casual</li>
                                <li class="contain__sections__list__item">Deportiva</li>
                                <li class="contain__sections__list__item">Escolar</li>
                                <li class="contain__sections__list__item">Futbol</li>
                            </ul>
                        </div>
                        
    
                        <div>
                            <h3 class="contain__sections__title contain__sections__title--category">Niña</h3>
                            <ul class="contain__sections__list">
                                <li class="contain__sections__list__item">Casual</li>
                                <li class="contain__sections__list__item">Deportiva</li>
                                <li class="contain__sections__list__item">Escolar</li>
                                <li class="contain__sections__list__item">Futbol</li>
                            </ul>
                        </div>
    
                        <div>
                            <h3 class="contain__sections__title contain__sections__title--category">Mujer</h3>
                            <ul class="contain__sections__list">
                                <li class="contain__sections__list__item">Casual</li>
                                <li class="contain__sections__list__item">Deportiva</li>
                                <li class="contain__sections__list__item">Trabajo</li>
                            </ul>
                        </div>
    
                        <div>
                            <h3 class="contain__sections__title contain__sections__title--category">Hombre</h3>
                            <ul class="contain__sections__list">
                                <li class="contain__sections__list__item">Casual</li>
                                <li class="contain__sections__list__item">Deportiva</li>
                                <li class="contain__sections__list__item">Trabajo</li>
                                <li class="contain__sections__list__item">Futbol</li>
                            </ul>
                        </div>
                    </div>
    
                    <img src="<?php echo base_url('assets/images/nav_img.jpg') ?>" title="banner" class="navbar__wrapper__secondary__contain__sales">
                        
    
                </div>
            </div>
            
        </div>
    </nav>

    <?php
        $session = session();
        $cart =\Config\Services::cart();
        $cart = $cart->contents();
        $total = 0;
    ?>
    
    <div class="cart" id="cart">
        <div class="cart__wrapper">
            
            <button class="btn" id="btn-remove-cart">❌</button>
            
            <div class="cart__wrapper__list">

                <?php if ($cart): ?>
                    <?php foreach ($cart as $shoe): ?>
                        <?php $total += $shoe['price']; ?>
                        <div class="cart__wrapper__list__item" title="<?php echo $shoe['name'] ?>" >
                            <div class="cart__wrapper__list__item__img" style="background-image: url(<?php  echo base_url('public/uploads/').$shoe['imgURL']; ?>)"></div>
                            <div class="cart__wrapper__list__item__title" style="text-transform: uppercase;   text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?php echo $shoe['name'] ?>
                                <p class="cart__wrapper__list__item__title__price">$<?php echo $shoe['price'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="cart__wrapper__list__item d-flex justify-content-center align-items-center">
                        <h6 class="text-light">No tiene productos agregados</h6>
                    </div>
                <?php endif; ?>
            </div>
                
            <?php if ($cart): ?>
            <div class="cart__wrapper__total">
                <p class="cart__wrapper__total__price m-0">Total $ <?php echo $total; ?></p>
                <a href="<?php echo base_url('/user/my-cart') ?>" class="btn btn-light">Ver Carrito</a>
            </div>
            <?php endif; ?>
           
    
        </div>
    </div>