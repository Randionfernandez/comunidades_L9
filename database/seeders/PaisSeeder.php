<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        // Código ISO 3166-1 alfa-3 del país
        // Código ISO 3166-1 alfa-2 del país
        // Código ISO 3166-1 numérico del país
        // Nombre del país
        // En la wikipedia figuran 9 países más (4 Agosto 2021)
        $paises = [
            ['codigoISO3' => 'AND', 'codigoISO2' => 'AD', 'cod_numerico' => '20', 'nombre' => 'Andorra'],
            ['codigoISO3' => 'ARE', 'codigoISO2' => 'AE', 'cod_numerico' => '784', 'nombre' => 'Emiratos Árabes Unidos'],
            ['codigoISO3' => 'AFG', 'codigoISO2' => 'AF', 'cod_numerico' => '4', 'nombre' => 'Afganistán'],
            ['codigoISO3' => 'ATG', 'codigoISO2' => 'AG', 'cod_numerico' => '28', 'nombre' => 'Antigua y Barbuda'],
            ['codigoISO3' => 'AIA', 'codigoISO2' => 'AI', 'cod_numerico' => '660', 'nombre' => 'Anguila'],
            ['codigoISO3' => 'ALB', 'codigoISO2' => 'AL', 'cod_numerico' => '8', 'nombre' => 'Albania'],
            ['codigoISO3' => 'ARM', 'codigoISO2' => 'AM', 'cod_numerico' => '51', 'nombre' => 'Armenia'],
            ['codigoISO3' => 'ANT', 'codigoISO2' => 'AN', 'cod_numerico' => '530', 'nombre' => 'Antillas Neerlandesas'],
            ['codigoISO3' => 'AGO', 'codigoISO2' => 'AO', 'cod_numerico' => '24', 'nombre' => 'Angola'],
            ['codigoISO3' => 'ATA', 'codigoISO2' => 'AQ', 'cod_numerico' => '10', 'nombre' => 'Antártida'],
            ['codigoISO3' => 'ARG', 'codigoISO2' => 'AR', 'cod_numerico' => '32', 'nombre' => 'Argentina'],
            ['codigoISO3' => 'ASM', 'codigoISO2' => 'AS', 'cod_numerico' => '16', 'nombre' => 'Samoa Americana'],
            ['codigoISO3' => 'AUT', 'codigoISO2' => 'AT', 'cod_numerico' => '40', 'nombre' => 'Austria'],
            ['codigoISO3' => 'AUS', 'codigoISO2' => 'AU', 'cod_numerico' => '36', 'nombre' => 'Australia'],
            ['codigoISO3' => 'ABW', 'codigoISO2' => 'AW', 'cod_numerico' => '533', 'nombre' => 'Aruba'],
            ['codigoISO3' => 'ALA', 'codigoISO2' => 'AX', 'cod_numerico' => '248', 'nombre' => 'Islas Áland'],
            ['codigoISO3' => 'AZE', 'codigoISO2' => 'AZ', 'cod_numerico' => '31', 'nombre' => 'Azerbaiyán'],
            ['codigoISO3' => 'BIH', 'codigoISO2' => 'BA', 'cod_numerico' => '70', 'nombre' => 'Bosnia y Herzegovina'],
            ['codigoISO3' => 'BRB', 'codigoISO2' => 'BB', 'cod_numerico' => '52', 'nombre' => 'Barbados'],
            ['codigoISO3' => 'BGD', 'codigoISO2' => 'BD', 'cod_numerico' => '50', 'nombre' => 'Bangladesh'],
            ['codigoISO3' => 'BEL', 'codigoISO2' => 'BE', 'cod_numerico' => '56', 'nombre' => 'Bélgica'],
            ['codigoISO3' => 'BFA', 'codigoISO2' => 'BF', 'cod_numerico' => '854', 'nombre' => 'Burkina Faso'],
            ['codigoISO3' => 'BGR', 'codigoISO2' => 'BG', 'cod_numerico' => '100', 'nombre' => 'Bulgaria'],
            ['codigoISO3' => 'BHR', 'codigoISO2' => 'BH', 'cod_numerico' => '48', 'nombre' => 'Bahréin'],
            ['codigoISO3' => 'BDI', 'codigoISO2' => 'BI', 'cod_numerico' => '108', 'nombre' => 'Burundi'],
            ['codigoISO3' => 'BEN', 'codigoISO2' => 'BJ', 'cod_numerico' => '204', 'nombre' => 'Benin'],
            ['codigoISO3' => 'BLM', 'codigoISO2' => 'BL', 'cod_numerico' => '652', 'nombre' => 'San Bartolomé'],
            ['codigoISO3' => 'BMU', 'codigoISO2' => 'BM', 'cod_numerico' => '60', 'nombre' => 'Bermudas'],
            ['codigoISO3' => 'BRN', 'codigoISO2' => 'BN', 'cod_numerico' => '96', 'nombre' => 'Brunéi'],
            ['codigoISO3' => 'BOL', 'codigoISO2' => 'BO', 'cod_numerico' => '68', 'nombre' => 'Bolivia'],
            ['codigoISO3' => 'BRA', 'codigoISO2' => 'BR', 'cod_numerico' => '76', 'nombre' => 'Brasil'],
            ['codigoISO3' => 'BHS', 'codigoISO2' => 'BS', 'cod_numerico' => '44', 'nombre' => 'Bahamas'],
            ['codigoISO3' => 'BTN', 'codigoISO2' => 'BT', 'cod_numerico' => '64', 'nombre' => 'Bhután'],
            ['codigoISO3' => 'BVT', 'codigoISO2' => 'BV', 'cod_numerico' => '74', 'nombre' => 'Isla Bouvet'],
            ['codigoISO3' => 'BWA', 'codigoISO2' => 'BW', 'cod_numerico' => '72', 'nombre' => 'Botsuana'],
            ['codigoISO3' => 'BLR', 'codigoISO2' => 'BY', 'cod_numerico' => '112', 'nombre' => 'Belarús'],
            ['codigoISO3' => 'BLZ', 'codigoISO2' => 'BZ', 'cod_numerico' => '84', 'nombre' => 'Belice'],
            ['codigoISO3' => 'CAN', 'codigoISO2' => 'CA', 'cod_numerico' => '124', 'nombre' => 'Canadá'],
            ['codigoISO3' => 'CCK', 'codigoISO2' => 'CC', 'cod_numerico' => '166', 'nombre' => 'Islas Cocos'],
            ['codigoISO3' => 'CAF', 'codigoISO2' => 'CF', 'cod_numerico' => '140', 'nombre' => 'República Centro-Africana'],
            ['codigoISO3' => 'COG', 'codigoISO2' => 'CG', 'cod_numerico' => '178', 'nombre' => 'Congo'],
            ['codigoISO3' => 'CHE', 'codigoISO2' => 'CH', 'cod_numerico' => '756', 'nombre' => 'Suiza'],
            ['codigoISO3' => 'CIV', 'codigoISO2' => 'CI', 'cod_numerico' => '384', 'nombre' => 'Costa de Marfil'],
            ['codigoISO3' => 'COK', 'codigoISO2' => 'CK', 'cod_numerico' => '184', 'nombre' => 'Islas Cook'],
            ['codigoISO3' => 'CHL', 'codigoISO2' => 'CL', 'cod_numerico' => '152', 'nombre' => 'Chile'],
            ['codigoISO3' => 'CMR', 'codigoISO2' => 'CM', 'cod_numerico' => '120', 'nombre' => 'Camerún'],
            ['codigoISO3' => 'CHN', 'codigoISO2' => 'CN', 'cod_numerico' => '156', 'nombre' => 'China'],
            ['codigoISO3' => 'COL', 'codigoISO2' => 'CO', 'cod_numerico' => '170', 'nombre' => 'Colombia'],
            ['codigoISO3' => 'CRI', 'codigoISO2' => 'CR', 'cod_numerico' => '188', 'nombre' => 'Costa Rica'],
            ['codigoISO3' => 'CUB', 'codigoISO2' => 'CU', 'cod_numerico' => '192', 'nombre' => 'Cuba'],
            ['codigoISO3' => 'CPV', 'codigoISO2' => 'CV', 'cod_numerico' => '132', 'nombre' => 'Cabo Verde'],
            ['codigoISO3' => 'CXR', 'codigoISO2' => 'CX', 'cod_numerico' => '162', 'nombre' => 'Islas Christmas'],
            ['codigoISO3' => 'CYP', 'codigoISO2' => 'CY', 'cod_numerico' => '196', 'nombre' => 'Chipre'],
            ['codigoISO3' => 'CZE', 'codigoISO2' => 'CZ', 'cod_numerico' => '203', 'nombre' => 'República Checa'],
            ['codigoISO3' => 'DEU', 'codigoISO2' => 'DE', 'cod_numerico' => '276', 'nombre' => 'Alemania'],
            ['codigoISO3' => 'DJI', 'codigoISO2' => 'DJ', 'cod_numerico' => '262', 'nombre' => 'Yibuti'],
            ['codigoISO3' => 'DNK', 'codigoISO2' => 'DK', 'cod_numerico' => '208', 'nombre' => 'Dinamarca'],
            ['codigoISO3' => 'DMA', 'codigoISO2' => 'DM', 'cod_numerico' => '212', 'nombre' => 'Domínica'],
            ['codigoISO3' => 'DOM', 'codigoISO2' => 'DO', 'cod_numerico' => '214', 'nombre' => 'República Dominicana'],
            ['codigoISO3' => 'DZA', 'codigoISO2' => 'DZ', 'cod_numerico' => '12', 'nombre' => 'Argel'],
            ['codigoISO3' => 'ECU', 'codigoISO2' => 'EC', 'cod_numerico' => '218', 'nombre' => 'Ecuador'],
            ['codigoISO3' => 'EST', 'codigoISO2' => 'EE', 'cod_numerico' => '233', 'nombre' => 'Estonia'],
            ['codigoISO3' => 'EGY', 'codigoISO2' => 'EG', 'cod_numerico' => '818', 'nombre' => 'Egipto'],
            ['codigoISO3' => 'ESH', 'codigoISO2' => 'EH', 'cod_numerico' => '732', 'nombre' => 'Sahara Occidental'],
            ['codigoISO3' => 'ERI', 'codigoISO2' => 'ER', 'cod_numerico' => '232', 'nombre' => 'Eritrea'],
            ['codigoISO3' => 'ESP', 'codigoISO2' => 'ES', 'cod_numerico' => '724', 'nombre' => 'España'],
            ['codigoISO3' => 'ETH', 'codigoISO2' => 'ET', 'cod_numerico' => '231', 'nombre' => 'Etiopía'],
            ['codigoISO3' => 'FIN', 'codigoISO2' => 'FI', 'cod_numerico' => '246', 'nombre' => 'Finlandia'],
            ['codigoISO3' => 'FJI', 'codigoISO2' => 'FJ', 'cod_numerico' => '242', 'nombre' => 'Fiji'],
            ['codigoISO3' => 'KLK', 'codigoISO2' => 'FK', 'cod_numerico' => '238', 'nombre' => 'Islas Malvinas'],
            ['codigoISO3' => 'FSM', 'codigoISO2' => 'FM', 'cod_numerico' => '583', 'nombre' => 'Micronesia'],
            ['codigoISO3' => 'FRO', 'codigoISO2' => 'FO', 'cod_numerico' => '234', 'nombre' => 'Islas Faroe'],
            ['codigoISO3' => 'FRA', 'codigoISO2' => 'FR', 'cod_numerico' => '250', 'nombre' => 'Francia'],
            ['codigoISO3' => 'GAB', 'codigoISO2' => 'GA', 'cod_numerico' => '266', 'nombre' => 'Gabón'],
            ['codigoISO3' => 'GBR', 'codigoISO2' => 'GB', 'cod_numerico' => '826', 'nombre' => 'Reino Unido'],
            ['codigoISO3' => 'GRD', 'codigoISO2' => 'GD', 'cod_numerico' => '308', 'nombre' => 'Granada'],
            ['codigoISO3' => 'GEO', 'codigoISO2' => 'GE', 'cod_numerico' => '268', 'nombre' => 'Georgia'],
            ['codigoISO3' => 'GUF', 'codigoISO2' => 'GF', 'cod_numerico' => '254', 'nombre' => 'Guayana Francesa'],
            ['codigoISO3' => 'GGY', 'codigoISO2' => 'GG', 'cod_numerico' => '831', 'nombre' => 'Guernsey'],
            ['codigoISO3' => 'GHA', 'codigoISO2' => 'GH', 'cod_numerico' => '288', 'nombre' => 'Ghana'],
            ['codigoISO3' => 'GIB', 'codigoISO2' => 'GI', 'cod_numerico' => '292', 'nombre' => 'Gibraltar'],
            ['codigoISO3' => 'GRL', 'codigoISO2' => 'GL', 'cod_numerico' => '304', 'nombre' => 'Groenlandia'],
            ['codigoISO3' => 'GMB', 'codigoISO2' => 'GM', 'cod_numerico' => '270', 'nombre' => 'Gambia'],
            ['codigoISO3' => 'GIN', 'codigoISO2' => 'GN', 'cod_numerico' => '324', 'nombre' => 'Guinea'],
            ['codigoISO3' => 'GLP', 'codigoISO2' => 'GP', 'cod_numerico' => '312', 'nombre' => 'Guadalupe'],
            ['codigoISO3' => 'GNQ', 'codigoISO2' => 'GQ', 'cod_numerico' => '226', 'nombre' => 'Guinea Ecuatorial'],
            ['codigoISO3' => 'GRC', 'codigoISO2' => 'GR', 'cod_numerico' => '300', 'nombre' => 'Grecia'],
            ['codigoISO3' => 'SGS', 'codigoISO2' => 'GS', 'cod_numerico' => '239', 'nombre' => 'Georgia del Sur e Islas Sandwich del Sur'],
            ['codigoISO3' => 'GTM', 'codigoISO2' => 'GT', 'cod_numerico' => '320', 'nombre' => 'Guatemala'],
            ['codigoISO3' => 'GUM', 'codigoISO2' => 'GU', 'cod_numerico' => '316', 'nombre' => 'Guam'],
            ['codigoISO3' => 'GNB', 'codigoISO2' => 'GW', 'cod_numerico' => '624', 'nombre' => 'Guinea-Bissau'],
            ['codigoISO3' => 'GUY', 'codigoISO2' => 'GY', 'cod_numerico' => '328', 'nombre' => 'Guayana'],
            ['codigoISO3' => 'HKG', 'codigoISO2' => 'HK', 'cod_numerico' => '344', 'nombre' => 'Hong Kong'],
            ['codigoISO3' => 'HMD', 'codigoISO2' => 'HM', 'cod_numerico' => '334', 'nombre' => 'Islas Heard y McDonald'],
            ['codigoISO3' => 'HND', 'codigoISO2' => 'HN', 'cod_numerico' => '340', 'nombre' => 'Honduras'],
            ['codigoISO3' => 'HRV', 'codigoISO2' => 'HR', 'cod_numerico' => '191', 'nombre' => 'Croacia'],
            ['codigoISO3' => 'HTI', 'codigoISO2' => 'HT', 'cod_numerico' => '332', 'nombre' => 'Haití'],
            ['codigoISO3' => 'HUN', 'codigoISO2' => 'HU', 'cod_numerico' => '348', 'nombre' => 'Hungría'],
            ['codigoISO3' => 'IDN', 'codigoISO2' => 'ID', 'cod_numerico' => '360', 'nombre' => 'Indonesia'],
            ['codigoISO3' => 'IRL', 'codigoISO2' => 'IE', 'cod_numerico' => '372', 'nombre' => 'Irlanda'],
            ['codigoISO3' => 'ISR', 'codigoISO2' => 'IL', 'cod_numerico' => '376', 'nombre' => 'Israel'],
            ['codigoISO3' => 'IMN', 'codigoISO2' => 'IM', 'cod_numerico' => '833', 'nombre' => 'Isla de Man'],
            ['codigoISO3' => 'IND', 'codigoISO2' => 'IN', 'cod_numerico' => '356', 'nombre' => 'India'],
            ['codigoISO3' => 'IOT', 'codigoISO2' => 'IO', 'cod_numerico' => '86', 'nombre' => 'Territorio Británico del Océano Índico'],
            ['codigoISO3' => 'IRQ', 'codigoISO2' => 'IQ', 'cod_numerico' => '368', 'nombre' => 'Irak'],
            ['codigoISO3' => 'IRN', 'codigoISO2' => 'IR', 'cod_numerico' => '364', 'nombre' => 'Irán'],
            ['codigoISO3' => 'ISL', 'codigoISO2' => 'IS', 'cod_numerico' => '352', 'nombre' => 'Islandia'],
            ['codigoISO3' => 'ITA', 'codigoISO2' => 'IT', 'cod_numerico' => '380', 'nombre' => 'Italia'],
            ['codigoISO3' => 'JEY', 'codigoISO2' => 'JE', 'cod_numerico' => '832', 'nombre' => 'Jersey'],
            ['codigoISO3' => 'JAM', 'codigoISO2' => 'JM', 'cod_numerico' => '388', 'nombre' => 'Jamaica'],
            ['codigoISO3' => 'JOR', 'codigoISO2' => 'JO', 'cod_numerico' => '400', 'nombre' => 'Jordania'],
            ['codigoISO3' => 'JPN', 'codigoISO2' => 'JP', 'cod_numerico' => '392', 'nombre' => 'Japón'],
            ['codigoISO3' => 'KEN', 'codigoISO2' => 'KE', 'cod_numerico' => '404', 'nombre' => 'Kenia'],
            ['codigoISO3' => 'KGZ', 'codigoISO2' => 'KG', 'cod_numerico' => '417', 'nombre' => 'Kirguistán'],
            ['codigoISO3' => 'KHM', 'codigoISO2' => 'KH', 'cod_numerico' => '116', 'nombre' => 'Camboya'],
            ['codigoISO3' => 'KIR', 'codigoISO2' => 'KI', 'cod_numerico' => '296', 'nombre' => 'Kiribati'],
            ['codigoISO3' => 'COM', 'codigoISO2' => 'KM', 'cod_numerico' => '174', 'nombre' => 'Comoros'],
            ['codigoISO3' => 'KNA', 'codigoISO2' => 'KN', 'cod_numerico' => '659', 'nombre' => 'San Cristóbal y Nieves'],
            ['codigoISO3' => 'PRK', 'codigoISO2' => 'KP', 'cod_numerico' => '408', 'nombre' => 'Corea del Norte'],
            ['codigoISO3' => 'KOR', 'codigoISO2' => 'KR', 'cod_numerico' => '410', 'nombre' => 'Corea del Sur'],
            ['codigoISO3' => 'KWT', 'codigoISO2' => 'KW', 'cod_numerico' => '414', 'nombre' => 'Kuwait'],
            ['codigoISO3' => 'CYM', 'codigoISO2' => 'KY', 'cod_numerico' => '136', 'nombre' => 'Islas Caimán'],
            ['codigoISO3' => 'KAZ', 'codigoISO2' => 'KZ', 'cod_numerico' => '398', 'nombre' => 'Kazajstán'],
            ['codigoISO3' => 'LAO', 'codigoISO2' => 'LA', 'cod_numerico' => '418', 'nombre' => 'Laos'],
            ['codigoISO3' => 'LBN', 'codigoISO2' => 'LB', 'cod_numerico' => '422', 'nombre' => 'Líbano'],
            ['codigoISO3' => 'LCA', 'codigoISO2' => 'LC', 'cod_numerico' => '662', 'nombre' => 'Santa Lucía'],
            ['codigoISO3' => 'LIE', 'codigoISO2' => 'LI', 'cod_numerico' => '438', 'nombre' => 'Liechtenstein'],
            ['codigoISO3' => 'LKA', 'codigoISO2' => 'LK', 'cod_numerico' => '144', 'nombre' => 'Sri Lanka'],
            ['codigoISO3' => 'LBR', 'codigoISO2' => 'LR', 'cod_numerico' => '430', 'nombre' => 'Liberia'],
            ['codigoISO3' => 'LSO', 'codigoISO2' => 'LS', 'cod_numerico' => '426', 'nombre' => 'Lesotho'],
            ['codigoISO3' => 'LTU', 'codigoISO2' => 'LT', 'cod_numerico' => '440', 'nombre' => 'Lituania'],
            ['codigoISO3' => 'LUX', 'codigoISO2' => 'LU', 'cod_numerico' => '442', 'nombre' => 'Luxemburgo'],
            ['codigoISO3' => 'LVA', 'codigoISO2' => 'LV', 'cod_numerico' => '428', 'nombre' => 'Letonia'],
            ['codigoISO3' => 'LBY', 'codigoISO2' => 'LY', 'cod_numerico' => '434', 'nombre' => 'Libia'],
            ['codigoISO3' => 'MAR', 'codigoISO2' => 'MA', 'cod_numerico' => '504', 'nombre' => 'Marruecos'],
            ['codigoISO3' => 'MCO', 'codigoISO2' => 'MC', 'cod_numerico' => '492', 'nombre' => 'Mónaco'],
            ['codigoISO3' => 'MDA', 'codigoISO2' => 'MD', 'cod_numerico' => '498', 'nombre' => 'Moldova'],
            ['codigoISO3' => 'MNE', 'codigoISO2' => 'ME', 'cod_numerico' => '499', 'nombre' => 'Montenegro'],
            ['codigoISO3' => 'MDG', 'codigoISO2' => 'MG', 'cod_numerico' => '450', 'nombre' => 'Madagascar'],
            ['codigoISO3' => 'MHL', 'codigoISO2' => 'MH', 'cod_numerico' => '584', 'nombre' => 'Islas Marshall'],
            ['codigoISO3' => 'MKD', 'codigoISO2' => 'MK', 'cod_numerico' => '807', 'nombre' => 'Macedonia'],
            ['codigoISO3' => 'MLI', 'codigoISO2' => 'ML', 'cod_numerico' => '466', 'nombre' => 'Mali'],
            ['codigoISO3' => 'MMR', 'codigoISO2' => 'MM', 'cod_numerico' => '104', 'nombre' => 'Myanmar'],
            ['codigoISO3' => 'MNG', 'codigoISO2' => 'MN', 'cod_numerico' => '496', 'nombre' => 'Mongolia'],
            ['codigoISO3' => 'MAC', 'codigoISO2' => 'MO', 'cod_numerico' => '446', 'nombre' => 'Macao'],
            ['codigoISO3' => 'MTQ', 'codigoISO2' => 'MQ', 'cod_numerico' => '474', 'nombre' => 'Martinica'],
            ['codigoISO3' => 'MRT', 'codigoISO2' => 'MR', 'cod_numerico' => '478', 'nombre' => 'Mauritania'],
            ['codigoISO3' => 'MSR', 'codigoISO2' => 'MS', 'cod_numerico' => '500', 'nombre' => 'Montserrat'],
            ['codigoISO3' => 'MLT', 'codigoISO2' => 'MT', 'cod_numerico' => '470', 'nombre' => 'Malta'],
            ['codigoISO3' => 'MUS', 'codigoISO2' => 'MU', 'cod_numerico' => '480', 'nombre' => 'Mauricio'],
            ['codigoISO3' => 'MDV', 'codigoISO2' => 'MV', 'cod_numerico' => '462', 'nombre' => 'Maldivas'],
            ['codigoISO3' => 'MWI', 'codigoISO2' => 'MW', 'cod_numerico' => '454', 'nombre' => 'Malawi'],
            ['codigoISO3' => 'MEX', 'codigoISO2' => 'MX', 'cod_numerico' => '484', 'nombre' => 'México'],
            ['codigoISO3' => 'MYS', 'codigoISO2' => 'MY', 'cod_numerico' => '458', 'nombre' => 'Malasia'],
            ['codigoISO3' => 'MOZ', 'codigoISO2' => 'MZ', 'cod_numerico' => '508', 'nombre' => 'Mozambique'],
            ['codigoISO3' => 'NAM', 'codigoISO2' => 'NA', 'cod_numerico' => '516', 'nombre' => 'Namibia'],
            ['codigoISO3' => 'NCL', 'codigoISO2' => 'NC', 'cod_numerico' => '540', 'nombre' => 'Nueva Caledonia'],
            ['codigoISO3' => 'NER', 'codigoISO2' => 'NE', 'cod_numerico' => '562', 'nombre' => 'Níger'],
            ['codigoISO3' => 'NFK', 'codigoISO2' => 'NF', 'cod_numerico' => '574', 'nombre' => 'Islas Norkfolk'],
            ['codigoISO3' => 'NGA', 'codigoISO2' => 'NG', 'cod_numerico' => '566', 'nombre' => 'Nigeria'],
            ['codigoISO3' => 'NIC', 'codigoISO2' => 'NI', 'cod_numerico' => '558', 'nombre' => 'Nicaragua'],
            ['codigoISO3' => 'NLD', 'codigoISO2' => 'NL', 'cod_numerico' => '528', 'nombre' => 'Países Bajos'],
            ['codigoISO3' => 'NOR', 'codigoISO2' => 'NO', 'cod_numerico' => '578', 'nombre' => 'Noruega'],
            ['codigoISO3' => 'NPL', 'codigoISO2' => 'NP', 'cod_numerico' => '524', 'nombre' => 'Nepal'],
            ['codigoISO3' => 'NRU', 'codigoISO2' => 'NR', 'cod_numerico' => '520', 'nombre' => 'Nauru'],
            ['codigoISO3' => 'NIU', 'codigoISO2' => 'NU', 'cod_numerico' => '570', 'nombre' => 'Niue'],
            ['codigoISO3' => 'NZL', 'codigoISO2' => 'NZ', 'cod_numerico' => '554', 'nombre' => 'Nueva Zelanda'],
            ['codigoISO3' => 'OMN', 'codigoISO2' => 'OM', 'cod_numerico' => '512', 'nombre' => 'Omán'],
            ['codigoISO3' => 'PAN', 'codigoISO2' => 'PA', 'cod_numerico' => '591', 'nombre' => 'Panamá'],
            ['codigoISO3' => 'PER', 'codigoISO2' => 'PE', 'cod_numerico' => '604', 'nombre' => 'Perú'],
            ['codigoISO3' => 'PYF', 'codigoISO2' => 'PF', 'cod_numerico' => '258', 'nombre' => 'Polinesia Francesa'],
            ['codigoISO3' => 'PNG', 'codigoISO2' => 'PG', 'cod_numerico' => '598', 'nombre' => 'Papúa Nueva Guinea'],
            ['codigoISO3' => 'PHL', 'codigoISO2' => 'PH', 'cod_numerico' => '608', 'nombre' => 'Filipinas'],
            ['codigoISO3' => 'PAK', 'codigoISO2' => 'PK', 'cod_numerico' => '586', 'nombre' => 'Pakistán'],
            ['codigoISO3' => 'POL', 'codigoISO2' => 'PL', 'cod_numerico' => '616', 'nombre' => 'Polonia'],
            ['codigoISO3' => 'SPM', 'codigoISO2' => 'PM', 'cod_numerico' => '666', 'nombre' => 'San Pedro y Miquelón'],
            ['codigoISO3' => 'PCN', 'codigoISO2' => 'PN', 'cod_numerico' => '612', 'nombre' => 'Islas Pitcairn'],
            ['codigoISO3' => 'PRI', 'codigoISO2' => 'PR', 'cod_numerico' => '630', 'nombre' => 'Puerto Rico'],
            ['codigoISO3' => 'PSE', 'codigoISO2' => 'PS', 'cod_numerico' => '275', 'nombre' => 'Palestina'],
            ['codigoISO3' => 'PRT', 'codigoISO2' => 'PT', 'cod_numerico' => '620', 'nombre' => 'Portugal'],
            ['codigoISO3' => 'PLW', 'codigoISO2' => 'PW', 'cod_numerico' => '585', 'nombre' => 'Islas Palaos'],
            ['codigoISO3' => 'PRY', 'codigoISO2' => 'PY', 'cod_numerico' => '600', 'nombre' => 'Paraguay'],
            ['codigoISO3' => 'QAT', 'codigoISO2' => 'QA', 'cod_numerico' => '634', 'nombre' => 'Qatar'],
            ['codigoISO3' => 'REU', 'codigoISO2' => 'RE', 'cod_numerico' => '638', 'nombre' => 'Reunión'],
            ['codigoISO3' => 'ROU', 'codigoISO2' => 'RO', 'cod_numerico' => '642', 'nombre' => 'Rumanía'],
            ['codigoISO3' => 'SRB', 'codigoISO2' => 'RS', 'cod_numerico' => '688', 'nombre' => 'Serbia y Montenegro'],
            ['codigoISO3' => 'RUS', 'codigoISO2' => 'RU', 'cod_numerico' => '643', 'nombre' => 'Rusia'],
            ['codigoISO3' => 'RWA', 'codigoISO2' => 'RW', 'cod_numerico' => '646', 'nombre' => 'Ruanda'],
            ['codigoISO3' => 'SAU', 'codigoISO2' => 'SA', 'cod_numerico' => '682', 'nombre' => 'Arabia Saudita'],
            ['codigoISO3' => 'SLB', 'codigoISO2' => 'SB', 'cod_numerico' => '90', 'nombre' => 'Islas Solomón'],
            ['codigoISO3' => 'SYC', 'codigoISO2' => 'SC', 'cod_numerico' => '690', 'nombre' => 'Seychelles'],
            ['codigoISO3' => 'SDN', 'codigoISO2' => 'SD', 'cod_numerico' => '736', 'nombre' => 'Sudán'],
            ['codigoISO3' => 'SWE', 'codigoISO2' => 'SE', 'cod_numerico' => '752', 'nombre' => 'Suecia'],
            ['codigoISO3' => 'SGP', 'codigoISO2' => 'SG', 'cod_numerico' => '702', 'nombre' => 'Singapur'],
            ['codigoISO3' => 'SHN', 'codigoISO2' => 'SH', 'cod_numerico' => '654', 'nombre' => 'Santa Elena'],
            ['codigoISO3' => 'SVN', 'codigoISO2' => 'SI', 'cod_numerico' => '705', 'nombre' => 'Eslovenia'],
            ['codigoISO3' => 'SJM', 'codigoISO2' => 'SJ', 'cod_numerico' => '744', 'nombre' => 'Islas Svalbard y Jan Mayen'],
            ['codigoISO3' => 'SVK', 'codigoISO2' => 'SK', 'cod_numerico' => '703', 'nombre' => 'Eslovaquia'],
            ['codigoISO3' => 'SLE', 'codigoISO2' => 'SL', 'cod_numerico' => '694', 'nombre' => 'Sierra Leona'],
            ['codigoISO3' => 'SMR', 'codigoISO2' => 'SM', 'cod_numerico' => '674', 'nombre' => 'San Marino'],
            ['codigoISO3' => 'SEN', 'codigoISO2' => 'SN', 'cod_numerico' => '686', 'nombre' => 'Senegal'],
            ['codigoISO3' => 'SOM', 'codigoISO2' => 'SO', 'cod_numerico' => '706', 'nombre' => 'Somalia'],
            ['codigoISO3' => 'SUR', 'codigoISO2' => 'SR', 'cod_numerico' => '740', 'nombre' => 'Surinam'],
            ['codigoISO3' => 'STP', 'codigoISO2' => 'ST', 'cod_numerico' => '678', 'nombre' => 'Santo Tomé y Príncipe'],
            ['codigoISO3' => 'SLV', 'codigoISO2' => 'SV', 'cod_numerico' => '222', 'nombre' => 'El Salvador'],
            ['codigoISO3' => 'SYR', 'codigoISO2' => 'SY', 'cod_numerico' => '760', 'nombre' => 'Siria'],
            ['codigoISO3' => 'SWZ', 'codigoISO2' => 'SZ', 'cod_numerico' => '748', 'nombre' => 'Suazilandia'],
            ['codigoISO3' => 'TCA', 'codigoISO2' => 'TC', 'cod_numerico' => '796', 'nombre' => 'Islas Turcas y Caicos'],
            ['codigoISO3' => 'TCD', 'codigoISO2' => 'TD', 'cod_numerico' => '148', 'nombre' => 'Chad'],
            ['codigoISO3' => 'ATF', 'codigoISO2' => 'TF', 'cod_numerico' => '260', 'nombre' => 'Territorios Australes Franceses'],
            ['codigoISO3' => 'TGO', 'codigoISO2' => 'TG', 'cod_numerico' => '768', 'nombre' => 'Togo'],
            ['codigoISO3' => 'THA', 'codigoISO2' => 'TH', 'cod_numerico' => '764', 'nombre' => 'Tailandia'],
            ['codigoISO3' => 'TZA', 'codigoISO2' => 'TZ', 'cod_numerico' => '834', 'nombre' => 'Tanzania'],
            ['codigoISO3' => 'TJK', 'codigoISO2' => 'TJ', 'cod_numerico' => '762', 'nombre' => 'Tayikistán'],
            ['codigoISO3' => 'TKL', 'codigoISO2' => 'TK', 'cod_numerico' => '772', 'nombre' => 'Tokelau'],
            ['codigoISO3' => 'TLS', 'codigoISO2' => 'TL', 'cod_numerico' => '626', 'nombre' => 'Timor-Leste'],
            ['codigoISO3' => 'TKM', 'codigoISO2' => 'TM', 'cod_numerico' => '795', 'nombre' => 'Turkmenistán'],
            ['codigoISO3' => 'TUN', 'codigoISO2' => 'TN', 'cod_numerico' => '788', 'nombre' => 'Túnez'],
            ['codigoISO3' => 'TON', 'codigoISO2' => 'TO', 'cod_numerico' => '776', 'nombre' => 'Tonga'],
            ['codigoISO3' => 'TUR', 'codigoISO2' => 'TR', 'cod_numerico' => '792', 'nombre' => 'Turquía'],
            ['codigoISO3' => 'TTO', 'codigoISO2' => 'TT', 'cod_numerico' => '780', 'nombre' => 'Trinidad y Tobago'],
            ['codigoISO3' => 'TUV', 'codigoISO2' => 'TV', 'cod_numerico' => '798', 'nombre' => 'Tuvalu'],
            ['codigoISO3' => 'TWN', 'codigoISO2' => 'TW', 'cod_numerico' => '158', 'nombre' => 'Taiwán'],
            ['codigoISO3' => 'UKR', 'codigoISO2' => 'UA', 'cod_numerico' => '804', 'nombre' => 'Ucrania'],
            ['codigoISO3' => 'UGA', 'codigoISO2' => 'UG', 'cod_numerico' => '800', 'nombre' => 'Uganda'],
            ['codigoISO3' => 'USA', 'codigoISO2' => 'US', 'cod_numerico' => '840', 'nombre' => 'Estados Unidos de América'],
            ['codigoISO3' => 'URY', 'codigoISO2' => 'UY', 'cod_numerico' => '858', 'nombre' => 'Uruguay'],
            ['codigoISO3' => 'UZB', 'codigoISO2' => 'UZ', 'cod_numerico' => '860', 'nombre' => 'Uzbekistán'],
            ['codigoISO3' => 'VAT', 'codigoISO2' => 'VA', 'cod_numerico' => '336', 'nombre' => 'Ciudad del Vaticano'],
            ['codigoISO3' => 'VCT', 'codigoISO2' => 'VC', 'cod_numerico' => '670', 'nombre' => 'San Vicente y las Granadinas'],
            ['codigoISO3' => 'VEN', 'codigoISO2' => 'VE', 'cod_numerico' => '862', 'nombre' => 'Venezuela'],
            ['codigoISO3' => 'VGB', 'codigoISO2' => 'VG', 'cod_numerico' => '92', 'nombre' => 'Islas Vírgenes Británicas'],
            ['codigoISO3' => 'VIR', 'codigoISO2' => 'VI', 'cod_numerico' => '850', 'nombre' => 'Islas Vírgenes de los Estados Unidos de América'],
            ['codigoISO3' => 'VNM', 'codigoISO2' => 'VN', 'cod_numerico' => '704', 'nombre' => 'Vietnam'],
            ['codigoISO3' => 'VUT', 'codigoISO2' => 'VU', 'cod_numerico' => '548', 'nombre' => 'Vanuatu'],
            ['codigoISO3' => 'WLF', 'codigoISO2' => 'WF', 'cod_numerico' => '876', 'nombre' => 'Wallis y Futuna'],
            ['codigoISO3' => 'WSM', 'codigoISO2' => 'WS', 'cod_numerico' => '882', 'nombre' => 'Samoa'],
            ['codigoISO3' => 'YEM', 'codigoISO2' => 'YE', 'cod_numerico' => '887', 'nombre' => 'Yemen'],
            ['codigoISO3' => 'MYT', 'codigoISO2' => 'YT', 'cod_numerico' => '175', 'nombre' => 'Mayotte'],
            ['codigoISO3' => 'ZAF', 'codigoISO2' => 'ZA', 'cod_numerico' => '710', 'nombre' => 'Sudáfrica'],
        ];

        // Tiempo aproximado de ejecución de este seeder = (151ms, ...)
        DB::table('paises')->insert($paises);

        // Tiempo aproximado de ejecución de este seeder = 40 segundos
//        foreach ($paises as $pais) {
//            Pais::create([
//                'codigoISO3' => $pais['codigoISO3'],
//                'codigoISO2' => $pais['codigoISO2'],
//                'cod_numerico' => $pais['cod_numerico'],
//                'nombre' => $pais['nombre'],
//            ]);
//        }
    }

}
