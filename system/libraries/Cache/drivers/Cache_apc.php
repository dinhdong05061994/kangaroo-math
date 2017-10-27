<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		nmh and apc cache and http://evertpot.com/107/
 * @copyright	Copyright (c) 2006 - 2012 EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource	
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter APC Caching Class 
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Core
 * @author		ExpressionEngine Dev Team
 * @link		
 */

class CI_Cache_apc extends CI_Driver {

	/**
	 * Get 
	 *
	 * Look for a value in the cache.  If it exists, return the data 
	 * if not, return FALSE
	 *
	 * @param 	string	
	 * @return 	mixed		value that is stored/FALSE on failure
	 */
	public function get($key, $id)
	{
		//$data = apc_fetch($id);

		//return (is_array($data)) ? $data[0] : FALSE;
        
        
        $filename = $this->getFileName($key, $id);
        if (!file_exists($filename) || !is_readable($filename)) { 
            echo $this->getFileName($key, $id);
            throw new Exception('Could not open file');
            echo $this->getFileName($key, $id);
            return false;
        }
            
            
        $data = file_get_contents($filename);
        
        $data = @unserialize($data);
        if(!$data) {
            //Unlionking the file when unserializing failed
            throw new Exception('cant read data');
            unlink($filename);
            return false;
        }
        
        
              
        // cheking if the data was expired
        //if (time() > $data[0]) {
            //unlinking
            //unlink($filename);
            //echo "het thoi gian";
            //return false;
        //}
        return $data[1];
        
	}

	// ------------------------------------------------------------------------	
	
	/**s
	 * Cache Save
	 *
	 * @param 	string		Unique Key
	 * @param 	mixed		Data to store
	 * @param 	int			Length of time (in seconds) to cache the data
	 *
	 * @return 	boolean		true on success/false on failure
	 */
	public function save($key, $id, $data, $ttl)
	{
		//return apc_store($id, array($data, time(), $ttl), $ttl);
        
        
        // Opening the file
        $h = fopen($this->getFileName($key, $id), 'w');
        if (!$h) throw new Exception('Could not write to cache');
        //Serializing along with the TTL
        $data = serialize(array(time()+$ttl, $data));
        if (fwrite($h, $data) === false) {
            throw new Exception('Could not write to cache');
        } 
        fclose($h);
        
	}
	
	// ------------------------------------------------------------------------
    
    
    //General function to find the filename for a certain key
    private function getFileName($key, $id) {
        //$this->load->library('session');
        //$user = $this->session->all_userdata();
        //$key = $key.$user['ID'];                
        return 'application/cache/tmp/'.sha1($key).sha1($id);
    }
    
    // ------------------------------------------------------------------------

	/**
	 * Delete from Cache
	 *
	 * @param 	mixed		unique identifier of the item in the cache
	 * @param 	boolean		true on success/false on failure
	 */
	public function delete($key,$id)
	{
        if (file_exists($this->getFileName($key, $id)))	{   
            unlink($this->getFileName($key, $id));
        }
        
		//return apc_delete($id);
	}

	// ------------------------------------------------------------------------

	/**
	 * Clean the cache
	 *
	 * @return 	boolean		false on failure/true on success
	 */
	public function clean()
	{
		return apc_clear_cache('user');
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Info
	 *
	 * @param 	string		user/filehits
	 * @return 	mixed		array on success, false on failure	
	 */
	 public function cache_info($type = NULL)
	 {
		 return apc_cache_info($type);
	 }

	// ------------------------------------------------------------------------

	/**
	 * Get Cache Metadata
	 *
	 * @param 	mixed		key to get cache metadata on
	 * @return 	mixed		array on success/false on failure
	 */
	public function get_metadata($id)
	{
		$stored = apc_fetch($id);

		if (count($stored) !== 3)
		{
			return FALSE;
		}

		list($data, $time, $ttl) = $stored;

		return array(
			'expire'	=> $time + $ttl,
			'mtime'		=> $time,
			'data'		=> $data
		);
	}

	// ------------------------------------------------------------------------

	/**
	 * is_supported()
	 *
	 * Check to see if APC is available on this system, bail if it isn't.
	 */
	public function is_supported()
	{
		if ( ! extension_loaded('apc') OR ini_get('apc.enabled') != "1")
		{
			log_message('error', 'The APC PHP extension must be loaded to use APC Cache.');
			return FALSE;
		}
		
		return TRUE;
	}

	// ------------------------------------------------------------------------

	
}
// End Class

/* End of file Cache_apc.php */
/* Location: ./system/libraries/Cache/drivers/Cache_apc.php */
