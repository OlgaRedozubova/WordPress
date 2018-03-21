<?php
function create_post_type() {
    register_post_type( 'acme_films',
        array(
            'labels' => array(
                // 'name' => __( 'Фильмы' ),
                //'singular_name' => __( 'Фильмы' ),

                'name'               => _x( 'Фильмы', 'film type general name', 'your-plugin-textdomain' ),
                'singular_name'      => _x( 'Фильм', 'film type singular name', 'your-plugin-textdomain' ),
                'menu_name'          => _x( 'Фильмы', 'admin menu', 'your-plugin-textdomain' ),
                'name_admin_bar'     => _x( 'Фильм', 'add new on admin bar', 'your-plugin-textdomain' ),
                'add_new'            => _x( 'Добавить фильм', 'film', 'your-plugin-textdomain' ),
                'add_new_item'       => __( 'Добавить новый фильм', 'your-plugin-textdomain' ),
                'new_item'           => __( 'Новый фильм', 'your-plugin-textdomain' ),
                'edit_item'          => __( 'Редактировать фильм', 'your-plugin-textdomain' ),
                'view_item'          => __( 'Посмотреть фильм', 'your-plugin-textdomain' ),
                'all_items'          => __( 'Все фильмы', 'your-plugin-textdomain' ),
                'search_items'       => __( 'Поск фильмов', 'your-plugin-textdomain' ),
                // 'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
                'not_found'          => __( 'Не найден фильм.', 'your-plugin-textdomain' ),
                'not_found_in_trash' => __( 'Не найден фильм in Trash.', 'your-plugin-textdomain' )
            ),
            //  'public' => true,
            'has_archive' => true,
            // 'labels'             => $labels,
            'description'        => __( 'Description.', 'your-plugin-textdomain' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'films' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' )
        )
    );
}
add_action( 'init', 'create_post_type' );

add_action('init', 'add_films_taxonomies');

function add_films_taxonomies() {
    // Add new taxonomy, genre
    $labels = array(
        'name'              => _x( 'Жанры', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x( 'Жанр', 'taxonomy general name', 'textdomain'),
        'search_items'      => __( 'Найти жанр', 'textdomain'),
        'all_items'         => __( 'Все жанры', 'textdomain'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Редактировать жанр', 'textdomain'),
        'update_item'       => __( 'Обновить жанр', 'textdomain'),
        'add_new_item'      => __( 'Добавить новый жанр', 'textdomain'),
        'new_item_name'     => __( 'Название нового жанра', 'textdomain'),
        'menu_name'         => __( 'Жанры', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );
    register_taxonomy( 'genre', 'acme_films', $args );
    // Add new taxonomy, country
    $labels = array(
        'name'              => _x( 'Страны', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x( 'Страна', 'taxonomy general name', 'textdomain'),
        'search_items'      => __( 'Найти страну', 'textdomain'),
        'all_items'         => __( 'Все страны', 'textdomain'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Редактировать страну', 'textdomain'),
        'update_item'       => __( 'Обновить страну', 'textdomain'),
        'add_new_item'      => __( 'Добавить новую страну', 'textdomain'),
        'new_item_name'     => __( 'Название новой страны', 'textdomain'),
        'menu_name'         => __( 'Страны', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'country' ),
    );
    register_taxonomy( 'country', 'acme_films', $args );
    // Add new taxonomy, year
    $labels = array(
        'name'              => _x( 'Года выпуска', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x( 'Год выпуска', 'taxonomy general name', 'textdomain'),
        'search_items'      => __( 'Найти год выпуска', 'textdomain'),
        'all_items'         => __( 'Все года выпуска', 'textdomain'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Редактировать год выпуска', 'textdomain'),
        'update_item'       => __( 'Обновить год выпуска', 'textdomain'),
        'add_new_item'      => __( 'Добавить новый год выпуска', 'textdomain'),
        'new_item_name'     => __( 'Новый год выпуска', 'textdomain'),
        'menu_name'         => __( 'Года выпуска', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'year' ),
    );
    register_taxonomy( 'year', 'acme_films', $args );
    // Add new taxonomy, actor
    $labels = array(
        'name'              => _x( 'Актеры', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x( 'Актер', 'taxonomy general name', 'textdomain'),
        'search_items'      => __( 'Найти актера', 'textdomain'),
        'all_items'         => __( 'Все актеры', 'textdomain'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Редактировать актера', 'textdomain'),
        'update_item'       => __( 'Обновить актеры', 'textdomain'),
        'add_new_item'      => __( 'Добавить нового актера', 'textdomain'),
        'new_item_name'     => __( 'Новое наименование актера', 'textdomain'),
        'menu_name'         => __( 'Актеры', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'actor' ),
    );
    register_taxonomy( 'actor', 'acme_films', $args );
}
//--------------------------------
// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_film_func', 'acme_films', 'normal', 'high'  );
}

// html код блока для типа записей page
function extra_fields_box_film_func($post){
    ?>
    <p>
        <label>
            Стоимость сеанса
            <input type="text" name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" style="width:50%" />
        </label>
    </p>
    <p>
        <label>
            Дата выхода в прокат
            <input type="text" name="extra[date]" value="<?php echo get_post_meta($post->ID, 'date', 1); ?>" style="width:50%" />
        </label>
    </p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){
    if ( ! wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // выходим если это автосохранение
    if ( !current_user_can('edit_post', $post_id) ) return false; // выходим если юзер не имеет право редактировать запись

    if( !isset($_POST['extra']) ) return false; // выходим если данных нет

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map('trim', $_POST['extra']); // чистим все данные от пробелов по краям
    foreach( $_POST['extra'] as $key=>$value ){
        if( empty($value) ){
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}
?>