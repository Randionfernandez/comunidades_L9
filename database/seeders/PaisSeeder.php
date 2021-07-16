<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        // Nombre del pais
        // abreviatura ISO del pais
        // codigo ANSI del pais

        $paises = array(
        array("España","ESP","724"),
        array("Afganistán", "AFG", "4"),
        array("Aland Islands","ALI","248"),
        array("Albania","ALB","8"),
        array("Alemania","DEU","276"),
        array("Andorra","AND","20"),
        array("Angola","AGO","24"),
        array("Anguila","AIA","660"),
        array("Antártida","ATA","10"),
        array("Antigua y Barbuda","ATG","28"),
        array("Antillas Neerlandesas","ANT","530"),
        array("Arabia Saudita","SAU","682"),
        array("Argelia","DZA","12"),
        array("Argentina","ARG","32"),
        array("Armenia","ARM","51"),
        array("Aruba","ABW","533"),
        array("Australia","AUS","36"),
        array("Austria","AUT","40"),
        array("Azerbaiyán","AZE","31"),
        array("Bahamas","BHS","44"),
        array("Bahrein","BHR","48"),
        array("Bangladesh","BGD","50"),
        array("Barbados","BRB","52"),
        array("Belarús","BLR","112"),
        array("Bélgica","BEL","56"),
        array("Bélgica-Luxemburgo","BLX","58"),
        array("Belice","BLZ","84"),
        array("Benin","BEN","204"),
        array("Bermudas","BMU","60"),
        array("Bhután","BTN","64"),
        array("Bolivia","BOL","68"),
        array("Bonaire","BES","535"),
        array("Bosnia y Herzegovina","BIH","70"),
        array("Botswana","BWA","72"),
        array("Brasil","BRA","76"),
        array("Brunei Darussalam","BRN","96"),
        array("Bulgaria","BGR","100"),
        array("Burkina Faso","BFA","854"),
        array("Burundi","BDI","108"),
        array("Cabo Verde","CPV","132"),
        array("Camboya","KHM","116"),
        array("Camerún","CMR","120"),
        array("Canadá","CAN","124"),
        array("Categorías especiales","SPE","839"),
        array("Chad","TCD","148"),
        array("Checoslovaquia","CSK","200"),
        array("Chile","CHL","152"),
        array("China","CHN","156"),
        array("Chipre","CYP","196"),
        array("Colombia","COL","170"),
        array("Comando I del Pacífico de Estados Unidos","USP","849"),
        array("Comoras","COM","174"),
        array("Congo,  Rep. del","COG","178"),
        array("Congo,  Rep. Dem. del","ZAR","180"),
        array("Corea,  Rep. de","KOR","410"),
        array("Corea,  Rep. Dem. de","PRK","408"),
        array("Costa Rica","CRI","188"),
        array("Côte d'Ivoire","CIV","384"),
        array("Croacia","HRV","191"),
        array("Cuba","CUB","192"),
        array("Curacao","CUW","531"),
        array("Dinamarca","DNK","208"),
        array("Djibouti","DJI","262"),
        array("Dominica","DMA","212"),
        array("Ecuador","ECU","218"),
        array("Egipto,  Rep. �?rabe de","EGY","818"),
        array("El Salvador","SLV","222"),
        array("Emiratos �?rabes Unidos","ARE","784"),
        array("Eritrea","ERI","232"),
        array("Eslovenia","SVN","705"),
        array("Estados Unidos","USA","840"),
        array("Estonia","EST","233"),
        array("Etiopía (excluida Eritrea)","ETH","231"),
        array("Etiopía (incluida Eritrea)","ETF","230"),
        array("European Union","EUN","918"),
        array("Ex Sudán","SDN","736"),
        array("Federación de Rusia","RUS","643"),
        array("Fiji","FJI","242"),
        array("Filipinas","PHL","608"),
        array("Finlandia","FIN","246"),
        array("Fm Panama Cz","PCZ","592"),
        array("Fm Rhod Nyas","ZW1","717"),
        array("Fm Tanganyik","TAN","835"),
        array("Fm Vietnam DR","VDR","866"),
        array("Fm Vietnam Rp","SVR","868"),
        array("Fm Zanz-Pemb","ZPM","836"),
        array("Francia","FRA","250"),
        array("Gabón","GAB","266"),
        array("Gambia","GMB","270"),
        array("Gaza Strip","GAZ","274"),
        array("Georgia","GEO","268"),
        array("Ghana","GHA","288"),
        array("Gibraltar","GIB","292"),
        array("Granada","GRD","308"),
        array("Grecia","GRC","300"),
        array("Groenlandia","GRL","304"),
        array("Guadalupe","GLP","312"),
        array("Guam","GUM","316"),
        array("Guatemala","GTM","320"),
        array("Guayana Francesa","GUF","254"),
        array("Guinea","GIN","324"),
        array("Guinea Ecuatorial","GNQ","226"),
        array("Guinea-Bissau","GNB","624"),
        array("Guyana","GUY","328"),
        array("Haití","HTI","332"),
        array("Honduras","HND","340"),
        array("Hong Kong (China)","HKG","344"),
        array("Hungría","HUN","348"),
        array("India","IND","356"),
        array("Indonesia","IDN","360"),
        array("Irán,  Rep. Islámica del","IRN","364"),
        array("Iraq","IRQ","368"),
        array("Irlanda","IRL","372"),
        array("Isla Bouvet","BVT","74"),
        array("Isla Bunker","BUN","837"),
        array("Isla de Navidad","CXR","162"),
        array("Isla Norfolk","NFK","574"),
        array("Islandia","ISL","352"),
        array("Islas Caimán","CYM","136"),
        array("Islas Cocos (Keeling)","CCK","166"),
        array("Islas Cook","COK","184"),
        array("Islas del Pacífico","PCE","582"),
        array("Islas Falkland","FLK","238"),
        array("Islas Feroe","FRO","234"),
        array("Islas Georgias del Sur y Sandwich del Sur","SGS","239"),
        array("Islas Heard y McDonald","HMD","334"),
        array("Islas Marshall","MHL","584"),
        array("Islas Salomón","SLB","90"),
        array("Islas Turcas y Caicos","TCA","796"),
        array("Islas Ultramarinas Menores de Estados Unidos","UMI","581"),
        array("Islas Vírgenes (EE.UU.)","VIR","850"),
        array("Islas Vírgenes Británicas","VGB","92"),
        array("Islas Wallis y Futuna","WLF","876"),
        array("Israel","ISR","376"),
        array("Italia","ITA","380"),
        array("Jamaica","JAM","388"),
        array("Japón","JPN","392"),
        array("Jhonston Island","JTN","396"),
        array("Jordania","JOR","400"),
        array("Kazajstán","KAZ","398"),
        array("Kenya","KEN","404"),
        array("Kirguistán","KGZ","417"),
        array("Kiribati","KIR","296"),
        array("Kosovo","KSV","412"),
        array("Kuwait","KWT","414"),
        array("Lesotho","LSO","426"),
        array("Letonia","LVA","428"),
        array("Líbano","LBN","422"),
        array("Liberia","LBR","430"),
        array("Libia","LBY","434"),
        array("Liechtenstein","LIE","438"),
        array("Lituania","LTU","440"),
        array("Luxemburgo","LUX","442"),
        array("Macao","MAC","446"),
        array("Macedonia,  ex Rep. Yugoslava de","MKD","807"),
        array("Madagascar","MDG","450"),
        array("Malasia","MYS","458"),
        array("Malawi","MWI","454"),
        array("Maldivas","MDV","462"),
        array("Malí","MLI","466"),
        array("Malta","MLT","470"),
        array("Mariana","MNP","580"),
        array("Marruecos","MAR","504"),
        array("Martinica","MTQ","474"),
        array("Mauricio","MUS","480"),
        array("Mauritania","MRT","478"),
        array("Mayotte","MYT","175"),
        array("México","MEX","484"),
        array("Micronesia,  Estados Fed. de","FSM","583"),
        array("Midway Islands","MID","488"),
        array("Mónaco","MCO","492"),
        array("Mongolia","MNG","496"),
        array("Montenegro","MNT","499"),
        array("Montserrat","MSR","500"),
        array("Mozambique","MOZ","508"),
        array("Mundo","WLD","0"),
        array("Myanmar","MMR","104"),
        array("Namibia","NAM","516"),
        array("Nauru","NRU","520"),
        array("Nepal","NPL","524"),
        array("Nicaragua","NIC","558"),
        array("Níger","NER","562"),
        array("Nigeria","NGA","566"),
        array("Niue","NIU","570"),
        array("No especificados","UNS","898"),
        array("Noruega","NOR","578"),
        array("Nueva Caledonia","NCL","540"),
        array("Nueva Zelandia","NZL","554"),
        array("Omán","OMN","512"),
        array("Otra zona de Asia,  no esp.","OAS","490"),
        array("Países Bajos","NLD","528"),
        array("Pakistán","PAK","586"),
        array("Palau","PLW","585"),
        array("Panamá","PAN","591"),
        array("Papua Nueva Guinea","PNG","598"),
        array("Paraguay","PRY","600"),
        array("Pen Malaysia","PMY","459"),
        array("Perú","PER","604"),
        array("Pitcairn","PCN","612"),
        array("Polinesia Francesa","PYF","258"),
        array("Polonia","POL","616"),
        array("Portugal","PRT","620"),
        array("Puerto Rico","PRI","630"),
        array("Qatar","QAT","634"),
        array("Reino Unido","GBR","826"),
        array("República �?rabe Siria","SYR","760"),
        array("República Centroafricana","CAF","140"),
        array("República Checa","CZE","203"),
        array("República de Moldova","MDA","498"),
        array("República Democrática Alemana","DDR","278"),
        array("República Democrática Popular Lao","LAO","418"),
        array("República Dominicana","DOM","214"),
        array("República Eslovaca","SVK","703"),
        array("Reunión","REU","638"),
        array("Rumania","ROM","642"),
        array("Rwanda","RWA","646"),
        array("Ryukyu Is","RYU","647"),
        array("Sabah","SBH","461"),
        array("Sahara Occidental","ESH","732"),
        array("Saint Kitts y Nevis","KNA","659"),
        array("Saint Kitts-Nevis-Anguilla-Aru","KN1","658"),
        array("Samoa","WSM","882"),
        array("Samoa Americana","ASM","16"),
        array("San Marino","SMR","674"),
        array("San Martín","SXM","534"),
        array("San Pedro y Miquelón","SPM","666"),
        array("San Vicente y las Granadinas","VCT","670"),
        array("Santa Elena","SHN","654"),
        array("Santa Lucía","LCA","662"),
        array("Santa Sede","VAT","336"),
        array("Santo Tomé y Príncipe","STP","678"),
        array("Sarawak","SWK","457"),
        array("Senegal","SEN","686"),
        array("Serbia,  Rep. Fed. de (Serbia y Montenegro)","SER","891"),
        array("Seychelles","SYC","690"),
        array("Sierra Leona","SLE","694"),
        array("SIKKIM","SIK","698"),
        array("Singapur","SGP","702"),
        array("Somalia","SOM","706"),
        array("Sri Lanka","LKA","144"),
        array("Sudáfrica","ZAF","710"),
        array("Sudán","SUD","729"),
        array("Sudán del Sur","SSD","728"),
        array("Suecia","SWE","752"),
        array("Suiza","CHE","756"),
        array("Suriname","SUR","740"),
        array("Svalbard and Jan Mayen Is","SJM","744"),
        array("Swazilandia","SWZ","748"),
        array("Tailandia","THA","764"),
        array("Taiwán,  China","TWN","158"),
        array("Tanzanía","TZA","834"),
        array("Tayikistán","TJK","762"),
        array("Territorio Antártico Británico","BAT","80"),
        array("Territorio Británico del Océano �?ndico","IOT","86"),
        array("Territorio Palestino Ocupado","PSE","275"),
        array("Tierras Australes y Antárticas Francesas","ATF","260"),
        array("Timor Oriental","TMP","626"),
        array("Togo","TGO","768"),
        array("Tokelau","TKL","772"),
        array("Tonga","TON","776"),
        array("Trinidad y Tobago","TTO","780"),
        array("Túnez","TUN","788"),
        array("Turkmenistán","TKM","795"),
        array("Turquía","TUR","792"),
        array("Tuvalu","TUV","798"),
        array("Ucrania","UKR","804"),
        array("Uganda","UGA","800"),
        array("Unión Soviética","SVU","810"),
        array("Uruguay","URY","858"),
        array("Uzbekistán","UZB","860"),
        array("Vanuatu","VUT","548"),
        array("Venezuela","VEN","862"),
        array("Viet Nam","VNM","704"),
        array("Wake Island","WAK","872"),
        array("Yemen,  Rep. del","YEM","887"),
        array("Yemen,  Rep. Dem. Del","YDR","720"),
        array("Yugoslavia,  Rep. Fed. de (Serbia y Montenegro)","YUG","890"),
        array("Zambia","ZMB","894"),
        array("Zimbabwe","ZWE","716"),
        );
        
        foreach ($paises as $pais) {
            Pais::create([
                'nombre' => $pais[0],
                'codigoISO' => $pais[1],
                'codigoANSI' => $pais[2]
            ]);
        }
    }

}