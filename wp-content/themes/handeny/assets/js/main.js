window.addEventListener('load',()=>{

    document.addEventListener('click',()=>{
        let search_input = document.querySelector('.wp-block-search__input'),
            nav_menu = document.querySelector('.navbar-nav'),
            login_menu = document.querySelector('.login-register'),
            search_open_block = document.querySelector('.wp-block-search__inside-wrapper'),
            search_icon = document.querySelector('.wp-block-search__button'),
            cart_button = document.querySelector('.wc-block-mini-cart__button ');

        if(search_input.ariaHidden == 'false') {
            nav_menu.style.display = 'none'
            cart_button.style.display = 'none'
            login_menu.style.display = 'none'
            search_open_block.style.position = 'relative'
            search_icon.style.position = 'absolute'
            search_open_block.style.left = '-200px'
        } else {
            nav_menu.style.display = 'flex'
            login_menu.style.display = 'flex'
            cart_button.style.display = 'flex'
            search_open_block.style.position = 'initial'
            search_icon.style.position = 'initial'
        }
    })
})