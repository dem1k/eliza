<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_pages {
    var $page = 1;
    var $total_pages;
    var $pages= array();
    public  function pages(){
        $this->pages[] = '<div class="nav_pages" style="visibility: visible; ">';
        $this->pages[] = '<ol class="list_pages bottom_nav">';
        if ($this->page > 2)
            $this->pages[] = '
        <span id="pagingprev" style="visibility: visible; ">
            <li class="nav_prev">
                <a href="?page=' . ($this->page - 1) . '"onclick="window.pager(' . ($this->page - 1) . ');return false;">Предыдущая</a>
            </li>
        </span>';
        $this->pages[] = '<span id="pagingmid">';
        for ($i = $this->page - 2; $i <= $this->page + 2; $i++) {

            $activeclass = '';
            if ($i == $this->page) $activeclass = "class=\"active\"";
            if ($i > $this->total_pages) continue;
            if ($i > 0)
                $this->pages[] = '<li ' . $activeclass . ' >
                        <a href="?page=' . $i . '" onclick="window.pager(' . $i . ');return false;">' . $i . '</a>
                      </li>';
        }
        $this->pages[] = '</span>';
        if ($i <= $this->total_pages-2) {
            $this->pages[] = '<span class="list_pages bottom_nav" id="pagingnext" style="visibility: visible; ">';
            $this->pages[] = '<li > <a href="#" onclick="return false">...</a> </li>';
        }
        if ($i <= $this->total_pages-2) {
            $this->pages[] ='
            <li>
                <a href="?page=' . $this->total_pages . '" onclick="window.pager(' . $this->total_pages . ');return false;">' . $this->total_pages . '</a>
            </li>';
        }
        if (($i+1) <= $this->total_pages) {
            $this->pages[] =
                '<li class="nav_next">
                <a href="#" onclick="window.pager('. ($i+1) .');return false">Следующая</a>
            </li>';
        }
        $this->pages[] = '</span>
            </ol>
        </div>';
        return $this->pages;
    }
}