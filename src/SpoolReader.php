<?php

class SpoolReader
{
    private $spoolDir;

    private $messages = array();

    public function __construct($dir)
    {
        if (file_exists($dir)) {
            $this->spoolDir = $dir;
        } else {
            throw new Exception("Folder $dir not found");
        }
    }

    /**
     * Reads all the messages in the spool and returns then in an array
     *
     * @return array
     */
    public function run()
    {
        // Get all the files from spool dir
        $files = glob($this->spoolDir.'/*');

        $tmp = [];
        // Sort the files by time
        foreach ($files as $f){
            $tmp[basename($f)] = filemtime($f);
        }
        
        arsort($tmp);
        $files = array_keys($tmp);

        foreach ($files as $file) {
            if (is_dir($file)) {
                continue;
            }
            $message = $this->parseFile($this->spoolDir . '/' . $file);
            $this->messages[] = $message;
        }

        return $this->messages;
    }

    /**
     * Parse a spool email and return it's contents as an array
     *
     * @param string $filename Absolute path to the file
     *
     * @throws Exception
     * @return array
     */
    private function parseFile($filename)
    {
        if(file_exists($filename)) {
            $file = file_get_contents($filename);
        } else {
            throw new Exception("File $filename not found");
        }

        /* @var $swiftMessage Swift_Message */
        $swiftMessage = unserialize($file);

        // Initialize the array that will hold our parsed message
        $message = array('headers' => array(), 'body' => '');

        foreach ($swiftMessage->getHeaders()->getAll() as $header) {
            $message['headers'][$header->getFieldName()] = $header->getFieldBodyModel();
        }

        $message['body'] = $swiftMessage->getBody();

        return $message;
    }
}