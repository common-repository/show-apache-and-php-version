<?php
/*
 *
 * Copyright (c) 2020 Predrag Supurović
 *
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer
 *    in the documentation and/or other materials provided with the
 *    distribution.
 * 3. The name of the author may not be used to endorse or promote
 *    products derived from this software without specific prior
 *    written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED.  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 * GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN
 * IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */


class SAPV_Plugin {
  private $plugin_id;
  private $plugin_name;
  private $settings_link;
  private $plugin_path;
  private $plugin_url;
  
  public function __construct() {
    
    $this->plugin_id = basename(__FILE__, ".php");
  
    $this->plugin_file = plugin_basename(__FILE__);
    $this->plugin_name = basename(__FILE__, ".php");
    
    $this->plugin_path = realpath(plugin_dir_path(__FILE__ ));
    $this->plugin_url = plugin_dir_url(__FILE__ );

    $lUPloaddirInfo = wp_get_upload_dir();
    
    $this->settings_link = '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . _('Settings') . '</a>';
    
    if (is_admin()) {
      add_action('update_footer', array(&$this,'update_footer_function'));
    }      



  
  }
  
  public function update_footer_function() {
    //echo apache_get_version() . " WordPress ";
    $lResult = $_SERVER['SERVER_SOFTWARE'];
    if (strpos ($lResult, 'OpenSSL') == false) {
	$lResult .= ' ' . OPENSSL_VERSION_TEXT;
    }
    if (strpos ($lResult, 'PHP') == false) {
	$lResult .= " PHP Version: " . phpversion();
    }

    $lResult .= ' WordPress ';

    echo  $lResult;

  }

  
  
} // end class
 

?>
