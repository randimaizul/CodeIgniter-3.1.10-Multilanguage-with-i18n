
# What is does :

Use CodeIgniter [CodeIgniter Language Class](https://codeigniter.com/user_guide/libraries/language.html) and i18n library from [Jérôme Jaglale](https://jeromejaglale.com/doc/php/codeigniter_i18n) through the language in the URI: 
- http://your_base_url.com/en/welcome
- http://your_base_url.com/id/welcome

# Installation and configuration:

1. Remove index.php in url codeigniter
   - create **.httaccess**
   - update **application/config/config.ph**
2. Create new language in **system/language/indonesia (copy from english folder)**
3. Create new language in **application/language**
   - create **application/language/english/test_lang.php**
   - create **application/language/indonesia/test_lang.php**
4. Create **application/core/MY_Config.php**
5. Create **application/core/MY_Lang.php**
6. Create **application/third_party/Lang.php**
   
   **Lang.php** file same with **MY_Lang.php** but updated on **switch_uri** function :
   ```
   function switch_uri($lang,$uri_string_switch)
   {
      if ((!empty($uri_string_switch)) && (array_key_exists($lang, $this->languages))){

        if ($uri_segment = $this->get_uri_lang($uri_string_switch))
        {
          $uri_segment['parts'][0] = $lang;
          $uri = implode('/',$uri_segment['parts']);
        }
        else
        {
          $uri = $lang.'/'.$this->uri;
        }
      }

      return $uri;
   }
   ```
   
7. Update **application/config/routes.php**
8. Update **application/config/autoload.php**
9. Update **application/controllers/Welcome.php**
10. Create **application/view/test_about.php**

# Test
1. Run `http://your_base_url.com/en/welcome/test` for english page
2. Run `http://your_base_url.com/id/welcome/test` for Indonesian page

# Notes
1. You might need to translate some of CodeIgniter's language files in `system/language`. Example: if you're using the **Greeting Statement** library for Indonesian pages, translate system/language/english/greeting_lang.php to application/language/indonesia/greeting_lang.php.

2. Get the current language:
   `$this->lang->lang()`
   
3. Switch to another language:
   - `anchor($this->lang->switch_uri('id',$this->uri->uri_string()),'Muncul halaman indonesia');`
   - `anchor($this->lang->switch_uri('en',$this->uri->uri_string()),'Show English Page');`
