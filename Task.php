<?php
class Task {
    public function revertPunctuationMarks($str = '') {
        if (strlen($str) > 0) {
            $arr = str_split($str);
            $regexp = '/[^\s0-9a-zA-Z]/ui';
            $symbols = [];
            foreach ($arr as $key => $value) {
                if (preg_match($regexp, $value)) {
                    $symbols[$key] = $value;
                }
            }
            $symbols = array_reverse($symbols, true);
            $symbols_keys = array_keys($symbols);
            foreach ($arr as $key => $value) {
                if (in_array($key, $symbols_keys)) {
                    $arr[$key] = array_shift($symbols);
                }
            }
            return implode('', $arr);
        }
        return false;
    }
}
//    $str = 'Привет, вы знаете как меня зовут? Если не знаете, можете спросить об этом !!';
//    $task = new Task();
//    echo $task->revertPunctuationMarks($str);
?>