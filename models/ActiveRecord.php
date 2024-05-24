<?php
namespace Model;
class ActiveRecord {

    public  $name;
    public  $path;
    public  $guestOk;
    public  $comment;
    public  $writable;

    private static $configPath = '/etc/samba/smb.conf';

    public function __construct($name, $path, $guestOk, $comment, $writable)
    {
        $this->name = $name;
        $this->path = $path;
        $this->guestOk = $guestOk;
        $this->comment = $comment;
        $this->writable = $writable;
    }

    /**
     * Parse the smb.conf file and return an array of SambaShare objects.
     *
     * @return SambaShare[]
     */
    public static function all()
    {
        $shares = [];
        $contents = file(self::$configPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $currentShare = null;

        foreach ($contents as $line) {
            if (preg_match('/^\[(.+)\]$/', trim($line), $matches)) {
                if ($currentShare) {
                    $shares[] = new self($currentShare['name'], $currentShare['path'], $currentShare['guestOk'], $currentShare['comment'], $currentShare['writable']);
                }
                $currentShare = [
                    'name' => $matches[1],
                    'path' => '',
                    'guestOk' => 'No',
                    'comment' => '',
                    'writable' => 'No'
                ];
            } elseif (strpos($line, '=') !== false && $currentShare) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                switch ($key) {
                    case 'path':
                        $currentShare['path'] = $value;
                        break;
                    case 'guest ok':
                        $currentShare['guestOk'] = ($value === 'yes') ? 'Sí' : 'No';
                        break;
                    case 'comment':
                        $currentShare['comment'] = $value;
                        break;
                    case 'writable':
                        $currentShare['writable'] = ($value === 'yes') ? 'Sí' : 'No';
                        break;
                }
            }
        }
        if ($currentShare) {
            $shares[] = new self($currentShare['name'], $currentShare['path'], $currentShare['guestOk'], $currentShare['comment'], $currentShare['writable']);
        }

        return $shares;
    }

}