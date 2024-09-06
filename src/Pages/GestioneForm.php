<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Http;

class GestioneForm extends Page
{
    protected static ?string $title = 'Verifica attivazione iPatente';
    protected ?string $subheading = 'Verifica attivazione iPatente';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'iPatente';
    protected static ?string $navigationLabel = 'json';
    protected static ?int $navigationSort = 2;
    protected static string $view = 'filament.pages.gestione-form';
    public $inputData;
    public $responseData;

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['Admin','Power User']);
    }

    public function getData()
    {
        $clientid = $this->inputData;
        $data = array('clientid' => $clientid);

        $giorno = Date('d');
        $mese = Date('m');
        $anno = Date('Y');

        $api_key = $mese.$giorno."o6(xiSDa%n8A~o:+gn2S5Xj`])+qU*qE]WoT!~926(zi.7N[>`-v}?#aEmqVXEJ7@zN_LU+JU~,4WN6b8:8xiEv)Ey'`Fp)(Tpd'RRDs}+Vzsta(5{[s{NPS?d%f(NcHn~HiQNPxc_g_o55KT'uoD^~se9P.FZCm3(A_YVdXKftgBAm{.;9y6^.8knAr'+;-XzF#sy-}hF6JWSo:xRaP(dE)_rEt(.-uo^2BPjLVA42ye)M,dsVpnHQ9dCtk6z%xN[bKf?x%T`F;Yn{Nz+a'Rqm]FC[;:jwh2w]MFhA/rX3gZqw94>;HweTsCX-/9aTtGyNz!W)E_,Z_KBH_N.Dry`~r*i@]*>px;hzDDEGkH:fx.Dx@'8@Jp?#}^t~6jmQNKXXHFy.dJY{:j!kC%8n~;2{*d~3B;_hE3-43XLP]9ohV;@4PM@FL{]]69[em(XN[S8t&3B{u%);y>s+`a'+}rJT[JqREEw:rkh`8,8c:(RTS)*C(>;FvQzimY^R+kB>PfzrC[D.6bb;bKs=.{ZvqBsD}9JEqkmjebSeeVW5]NBS)Lj&xN2ALir?gx7/FLgTi.32A7BX6JF%Qy(x.)/bQ5!}fSsVA7ypU3oHqQ+]#gDpei{cR`C[Q68_9ne;cnF&{@iG^d7gNusQ~759ax4'G^/,+,U[%L+3zS}VZ]eS6g`zhn(suzwh9Xu3=4etS^]]bRF{(d8?>iG;?nT}ZKP&gQw&[dP'E8+e:))[hJmNG7Het(Cm,Ja.>LXBt>jJUny~AQVA55PW@9erFD`H{M%xB7F66r8Xzh{5E;N[%#s.VH64^GT(srRKN?`SPUXssL!(ip6Zaq.m;=TEtnK5/aoFz:dnD9Q2CrjN(-D3KJwa,'+&Pg(tf5uN-2ZnRJ-SeZJb%kL9EJi%](h_A;-rhdth2sHaP,?Qv~x]azQq{]Yn_kc'A*hR3>,;*:+bM:;HwqQ/+-RFcW-?)}F?BWc[QLt=Cc..hGVhNr6sXm(6ZQ?K:Gq=zm]E)`Du:[;%HWUWK=rFB/^}LGqaEG4)&%S8Z6.^'M&{]Ypa&xjD}82W(MHTmwuG}jysg5}%G,]co/2#%Yx&`EgGf!;p,4%r!q_V>+(F!hMK[:S#xqr>(6>!{vTBrX-w'Q)+]Ma4kXURNRq7kF9*]4`cXf,&Ke;_hcF3vg7[=6tX:'S6q".$anno;
        $url = "https://desktop.ipatente.app/api/autoscuolenelweb/visite/prenotazioni.php?" . http_build_query($data);

        $jsonData = [];

        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . $api_key,
            ])->get($url);

            if ($response->successful()) {
                $jsonData = $response->json();
            }
        } catch (\Exception $e) {
            \Log::error('Errore nella chiamata API: '.$e->getMessage());
        }

        dd($jsonData);
        //$this->responseData = $jsonData;
    }

}
