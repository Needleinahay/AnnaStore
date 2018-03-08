<?php
/**
 * Intitialize a new PO translations file
 */
$this->extend('../layout');
$help = apply_filters('loco_external','https://localise.biz/wordpress/plugin/manual/msginit');
?> 

    <?php if( $params->has('ext') ):?> 
    <div class="notice inline notice-info">
        <p>
            <?php esc_html_e("You're creating translations directly from source code",'loco-translate')?>.
            <a href="<?php $ext->e('link')?>"><?php esc_html_e('Create template instead','loco-translate')?></a>.
        </p>
    </div><?php
    endif?> 
            

    <div class="notice inline notice-generic">

        <h2><?php $params->e('subhead')?></h2>
        <p><?php $params->e('summary')?></p>

        <form action="" method="post" enctype="application/x-www-form-urlencoded" id="loco-poinit"><?php
    
            foreach( $hidden as $name => $value ):?> 
            <input type="hidden" name="<?php echo $name?>" value="<?php $hidden->e($name)?>" /><?php
            endforeach;?> 
            
            <table class="form-table">
                <tbody class="loco-locales">
                    <tr valign="top">
                        <th scope="row">
                            <label for="loco-select-locale">
                                1. <?php esc_html_e('Choose a language','loco-translate')?>:
                            </label>
                        </th>
                        <td>
                            <fieldset>
                                <label for="loco-use-selector">
                                    <span><input type="radio" name="use-selector" value="1" checked id="loco-use-selector" /></span>
                                    <?php esc_attr_e('WordPress language','loco-translate')?>:
                                </label>
                                <div>
                                    <span class="lang nolang"></span>
                                    <select id="loco-select-locale" name="select-locale">
                                        <option value=""><?php esc_attr_e('No language selected','loco-translate')?></option>
                                        <optgroup label="<?php esc_attr_e( 'Installed languages', 'loco-translate' )?>"><?php
                                            /* @var Loco_mvc_ViewParams $option */
                                            foreach( $installed as $option ):?> 
                                            <option value="<?php $option->e('value')?>" data-icon="<?php $option->e('icon')?>"><?php $option->e('label')?></option><?php
                                            endforeach;?> 
                                        </optgroup>
                                        <optgroup label="<?php esc_attr_e( 'Available languages', 'loco-translate' )?>"><?php
                                            /* @var Loco_mvc_ViewParams $option */
                                            foreach( $locales as $option ):?> 
                                            <option value="<?php $option->e('value')?>" data-icon="<?php $option->e('icon')?>"><?php $option->e('label')?></option><?php
                                            endforeach;?> 
                                        </optgroup>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="disabled">
                                <label>
                                    <span><input type="radio" name="use-selector" value="0" /></span>
                                    <?php esc_attr_e('Custom language','loco-translate')?>:
                                </label>
                                <div>
                                    <span class="lang nolang"></span>
                                    <span class="loco-clearable"><input type="text" maxlength="14" name="custom-locale" value="" /></span>
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                </tbody>
                <tbody class="loco-paths">   
                    <tr valign="top">
                        <th scope="row">
                            <label>
                                2. <?php esc_html_e('Choose a location','loco-translate')?>:
                            </label>
                        </th>
                        <td>
                            <a href="<?php echo esc_url($help)?>#locations" class="has-icon icon-help" target="_blank"><?php esc_html_e("What's this?",'loco-translate')?></a>
                        </td>
                    </tr><?php
                    $choiceId = 0;
                    /* @var $location Loco_mvc_ViewParams */
                    foreach( $locations as $typeId => $location ):?> 
                    <tr class="compact">
                        <td>
                            <p class="description">
                                <?php $location->e('label')?>:
                            </p>
                        </td>
                        <td><?php
                        /* @var $parent Loco_mvc_FileParams */
                        foreach( $location['paths'] as $choice ): 
                            $parent = $choice['parent']; 
                            $offset = sprintf('%u',++$choiceId);?> 
                            <p>
                                <label>
                                    <input type="radio" name="select-path" value="<?php echo $offset?>" <?php echo $choice->checked?> />
                                    <input type="hidden" name="path[<?php echo $offset?>]" value="<?php $choice->e('hidden')?>" />
                                    <code class="path"><?php $parent->e('relpath')?>/<?php echo $choice->holder?></code>
                                </label>
                            </p><?php
                        endforeach?> 
                        </td>
                    </tr><?php
                    endforeach;?> 
                </tbody><?php
    
                if( $params->has('sourceLocale') ):?> 
                <tbody>
                    <tr valign="top">
                        <th scope="row" rowspan="3">
                            3. <?php esc_html_e('Template options','loco-translate')?>:
                        </th>
                        <td>
                            <a href="<?php echo esc_url($help)?>#copy" class="has-icon icon-help" target="_blank"><?php esc_html_e("What's this?",'loco-translate')?></a>
                        </td>
                    </tr>
                    <tr valign="top" class="compact">
                        <td>
                            <p>
                                <label>
                                    <input type="radio" name="strip" value="" />
                                    <?php $params->f('sourceLocale', __('Copy target translations from "%s"','loco-translate') )?> 
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input type="radio" name="strip" value="1" checked />
                                    <?php esc_html_e('Just copy English source strings','loco-translate')?> 
                                </label>
                            </p>
                        </td>
                    </tr>                    
                    <tr valign="top" class="compact">
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" name="link" value="1" />
                                    <?php $params->f('sourceLocale',__('Use "%s" as template when running Sync','loco-translate') )?> 
                                </label>
                            </p>
                        </td>
                    </tr>
                </tbody><?php
                endif?> 
            </table>
    
            <p class="submit">
                <button type="submit" class="button button-large button-primary" disabled><?php esc_html_e('Start translating','loco-translate')?></button>
            </p>
    
        </form>

    </div>