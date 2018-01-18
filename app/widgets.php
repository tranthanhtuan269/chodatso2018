<?php 

use App\TinBDS;

class MunuBarWidget {
    public function namageMenu($value)
    {
        switch ($value) {
            case 'tingoinhieu':
                $tingois = \DB::table('tinbdss')->take(3)
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh', 'users.name as phone')
                    ->orderBy('numcall', 'desc')
                    ->get();   
                    $html = '';
                    foreach ($tingois as $tinbds) {
                        $temp = substr($tinbds->images,0,-1);
                        $images = explode( ';', $temp ); 
                        $html .= '<li class="list-group-item">';
                        $html .= '<a href="'. URL::to('/') . '/' . $tinbds->id .'">';
                        $html .= '<img src="' . URL::to('/') . '/images/' . $images[0] .'"class="img-thumbnail" alt="Responsive image">';
                        $html .= '</a>';
                        $html .= '<div class="row"> ';
                        $html .= '<div class="col-xs-12 col-md-12 col-sm-12 price-prod"><span class="price-product">'. $tinbds->gia .' tỷ </span> - <span class="size-product">' . $tinbds->dien_tich .' m<sup>2</sup></span></div>';
                        $html .= '</div>';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-xs-12 col-md-8 col-sm-12 address-product"> '. $tinbds->ten_huyen .' - '. $tinbds->ten_tinh . '.</div>';
                        $html .= '</div>';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-xs-12 col-md-12 col-sm-12">';
                        //$html .= '<h4 class="title-product"> ' . $tinbds->tieu_de . '</h4>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</li>';
                    }
                break;
            case 'tinxemnhieu':
                $tingois = \DB::table('tinbdss')->take(3)
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh', 'users.name as phone')
                    ->orderBy('numcall', 'desc')
                    ->get();   
                    $html = '';
                    foreach ($tingois as $tinbds) {
                        $temp = substr($tinbds->images,0,-1);
                        $images = explode( ';', $temp ); 
                        $html .= '<li class="list-group-item">';
                        $html .= '<a href="'. URL::to('/') . '/' . $tinbds->id .'">';
                        $html .= '<img src="' . URL::to('/') . '/images/' . $images[0] .'"class="img-thumbnail" alt="Responsive image">';
                        $html .= '</a>';
                        $html .= '<div class="row"> ';
                        $html .= '<div class="col-xs-12 col-md-12 col-sm-12 price-prod"><span class="price-product">'. $tinbds->gia .' tỷ </span> - <span class="size-product">' . $tinbds->dien_tich .' m<sup>2</sup></span></div>';
                        $html .= '</div>';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-xs-12 col-md-8 col-sm-12 address-product"> '. $tinbds->ten_huyen .' - '. $tinbds->ten_tinh . '.</div>';
                        $html .= '</div>';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-xs-12 col-md-12 col-sm-12">';
                        //$html .= '<h4 class="title-product"> ' . $tinbds->tieu_de . '</h4>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</li>';
                    }
                break;
            case 'loaibds':
                $loaibdss = \DB::table('loaibdss')->get();   
                    $html = '';
                    foreach ($loaibdss as $loaibds) {
                        $html .= '<li class="list-group-item">';
                        $html .= '</li>';
                    }
                break;
            default:
                $html = '<ul>';
                $html = $html.'<li>Default 1</li>';
                $html = $html.'<li>Default 2</li>';
                $html = $html.'<li>Default 3</li>';
                $html = $html.'</ul>';
                break;
        }
        return $html;
    }
} 
Widget::register('menubar', 'MunuBarWidget@namageMenu');
