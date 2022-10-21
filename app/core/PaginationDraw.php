<?php

namespace App\Core;

class PaginationDraw
{
    public static function drawHeader()
    {
        return ' 
            <nav>
                <ul class="pagination">
        ';
    }

    public static function drawFooter()
    {
        return ' 
                </ul>
            </nav>
        ';
    }

    public static function drawPageActive($page, $link)
    {
        $link .= $page;
        return ' <li class="page-item active"><a class="page-link" href="' . $link . '">' . $page . '</a></li>';
    }

    public static function drawPage($page, $link)
    {
        $link .= $page;
        return ' <li class="page-item"><a class="page-link" href="=' . $link . '">' . $page . '</a></li>';
    }


    public static function draw(Pagination $pagination, $link)
    {
        $result = '';
        $result .= self::drawHeader();
        for ($page = 1; $page <= $pagination->totalPages; $page++) {
            if ($page == $pagination->page) {
                $result .= self::drawPageActive($page, $link);
            } else {
                $result .= self::drawPage($page, $link);
            }
        }
        $result .= self::drawFooter();

        return $result;
    }

    public static function showPageInfo(Pagination $pagination)
    {
        $total = $pagination->totalPages == 0 ? 1 : $pagination->totalPages;

        $result = '';
        $result .= 'Strona ' . $pagination->page . ' z ' . $total;
        return $result;
    }
}