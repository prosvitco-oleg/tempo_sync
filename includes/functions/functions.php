<?php

function p_startup()
{
    return \system\StartUp::instance();
}

if( ! function_exists( 'render_input' ) ){
    function render_input( array $args )
    {
        if( empty( $args['id'] ) ){
            return;
        }

        $args['type'] = isset( $args['type'] ) ? $args['type'] : 'text';
        $args['name'] = isset( $args['name'] ) ? $args['name'] : $args['id'];
        $args['class'] = isset( $args['class'] ) ? $args['class'] : '';
        $args['value'] = isset( $args['value'] ) ? $args['value'] : '';
        $args['description'] = isset( $args['description'] ) ? $args['description'] : '';

        $attributes = [];

        if ( ! empty( $args['attributes'] ) && is_array( $args['attributes'] ) ) {

            foreach ( $args['custom_attributes'] as $attribute => $value ) {
                $attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
            }
        }

       ?>
       <p class="input-field-wrapper input-<?php echo $args['id'] ?>">
            <label for="input_filed_<?php echo $args['id'] ?>">
                <?php echo wp_kses_post( $args['label'] ); ?>
            </label>

            <input type="<?php echo esc_attr( $args['type'] ); ?>" id="input_filed_<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" value="<?php echo esc_attr( $args['value'] ); ?>" <?php echo implode( ' ', $attributes ); ?> />

            <?php
                if( !empty( $args['description'] ) ){
                    echo '<span class="description">'. wp_kses_post( $args['description'] ) .'</span>';
                }
            ?>
       </p>
       <?php
    }
}