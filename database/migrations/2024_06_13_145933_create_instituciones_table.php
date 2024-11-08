<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('institucion');
            $table->decimal('latitud', 20, 17);
            $table->decimal('longitud', 20, 17);
            $table->timestamps();
            $table->string('imagen', 255)->nullable();
        });

        

        DB::table('instituciones')->insert([
            ['institucion' => 'Universidad Tecnológica de la Huasteca Hidalguense', 'latitud' => 21.15532100743571, 'longitud' => -98.38142377513684],
            ['institucion' => 'Universidad Tecnológica de la Sierra Hidalguense', 'latitud' => 20.66503007941751, 'longitud' => -98.67306294805486],
            ['institucion' => 'Universidad Tecnológica de la Zona Metropolitana del Valle de México', 'latitud' => 19.86688079780198, 'longitud' => -98.98214241717038],
            ['institucion' => 'Universidad Tecnológica de Mineral de la Reforma', 'latitud' => 20.03924495565199, 'longitud' => -98.71719871805038],
            ['institucion' => 'Universidad Tecnológica de Tulancingo', 'latitud' => 20.0756682199546, 'longitud' => -98.40512570367183],
            ['institucion' => 'Universidad Tecnológica del Valle del Mezquital', 'latitud' => 20.496059275676735, 'longitud' => -99.1827789882132],
            ['institucion' => 'Universidad Tecnológica Internacional Campus Hidalgo Tlaxcoapan', 'latitud' => 20.08704213460715, 'longitud' => -99.22256164034924],
            ['institucion' => 'Universidad Tecnológica Minera de Zimapán', 'latitud' => 20.724553546170878, 'longitud' => -99.3767105631757],
            ['institucion' => 'Universidad Tecnológica Tula-Tepeji', 'latitud' => 20.009290331042227, 'longitud' => -99.34316161291234],
            ['institucion' => 'Centro Cultural Europeo de Estudios Universitarios de Hidalgo', 'latitud' => 20.139256154700888, 'longitud' => -98.80954293683368],
            ['institucion' => 'Centro de Estudio Valores con Libertad, \'CEVAL\'', 'latitud' => 20.090900395211342, 'longitud' => -98.36915183065854],
            ['institucion' => 'Centro de Estudios Superiores Antares', 'latitud' => 20.11661420419463, 'longitud' => -98.75353180367092],
            ['institucion' => 'Centro de Estudios Superiores en Gastronomía y Turismo', 'latitud' => 20.113427140690675, 'longitud' => -98.75672030010091],
            ['institucion' => 'Centro de Estudios Superiores IDDEA', 'latitud' => 20.737167997642043, 'longitud' => -99.38138435703021],
            ['institucion' => 'Centro de Estudios Universitarios de Hidalgo', 'latitud' => 20.121832047936085, 'longitud' => -98.73185569550567],
            ['institucion' => 'Centro de Estudios Universitarios Vizcaya de las Américas', 'latitud' => 20.082897181262357, 'longitud' => -98.38264470367169],
            ['institucion' => 'Centro Hidalguense de Estudios Superiores', 'latitud' => 20.101120007199157, 'longitud' => -98.76453733250666],
            ['institucion' => 'Centro Humanista de Investigación y Desarrollo Multidisciplinario', 'latitud' => 20.09794711420425, 'longitud' => -98.77018811946328],
            ['institucion' => 'Centro Regional de Educación Normal Benito Juárez', 'latitud' => 20.115459181237117, 'longitud' => -98.73161960367096],
            ['institucion' => 'Centro Universitario Allende', 'latitud' => 20.053355565259306, 'longitud' => -99.34534484589388],
            ['institucion' => 'Centro Universitario Continental', 'latitud' => 20.118331026572132, 'longitud' => -98.74795710042524],
            ['institucion' => 'Centro Universitario de Desarrollo Intelectual', 'latitud' => 20.119069671283423, 'longitud' => -98.7384267170569],
            ['institucion' => 'Centro Universitario de Educación a Distancia', 'latitud' => 20.12371673253316, 'longitud' => -98.73221608452546],
            ['institucion' => 'Centro Universitario de Estudios Hans Gross', 'latitud' => 20.054597777718183, 'longitud' => -98.78856633665393],
            ['institucion' => 'Centro Universitario de la Ciudad de México', 'latitud' => 19.41457980793767, 'longitud' => -99.17952000054986],
            ['institucion' => 'Centro Universitario del Oriente de Hidalgo', 'latitud' => 20.108059500383696, 'longitud' => -98.28642790470886],
            ['institucion' => 'Centro Universitario Hidalguense', 'latitud' => 20.125355578347303, 'longitud' => -98.75041233968315],
            ['institucion' => 'Centro Universitario Interamericano', 'latitud' => 19.60311316466787, 'longitud' => -99.0576166115187],
            ['institucion' => 'Centro Universitario Metropolitano Hidalgo', 'latitud' => 20.057877796584386, 'longitud' => -98.7750742092157],
            ['institucion' => 'Centro Universitario Siglo XXI', 'latitud' => 20.102881706044542, 'longitud' => -98.75968310367124],
            ['institucion' => 'Centro Universitario Siglo XXI, Sede Zacualtipán', 'latitud' => 20.647873260328808, 'longitud' => -98.65885039354599],
            ['institucion' => 'Centro Universitario Vasco de Quiroga de Huejutla', 'latitud' => 21.148416167975107, 'longitud' => -98.41912016131796],
            ['institucion' => 'Círculo de Estudios de Logoterapia y Análisis Existencial', 'latitud' => 20.10381193270621, 'longitud' => -98.7474382975686],
            ['institucion' => 'Colegio de Estudios Superiores Hispanoamericano', 'latitud' => 20.511096910673047, 'longitud' => -99.19180299202327],
            ['institucion' => 'Colegio de Ortodoncia, Ortopedia e Implantología S.C.', 'latitud' => 18.922601368557064, 'longitud' => -99.23599521534305],
            ['institucion' => 'Instituto De Ciencias Agropecuarias', 'latitud' => 20.06989072, 'longitud' => -98.38563353],
            ['institucion' => 'Instituto De Ciencias Basicas E Ingenieria (ICBI)', 'latitud' => 20.09516709, 'longitud' => -98.71422612],
            ['institucion' => 'Instituto De Ciencias De La Salud (ICSA)', 'latitud' => 20.13588231, 'longitud' => -98.81231808],
            ['institucion' => 'Instituto De Ciencias Economico Administrativas (ICEA)', 'latitud' => 20.1416783, 'longitud' => -98.80562286],
            ['institucion' => 'Instituto De Ciencias Sociales Y Humanidades (ICSHU)', 'latitud' => 20.12184692, 'longitud' => -98.79623025],
            ['institucion' => 'Instituto De Ciencias Y Estudios Superiores De Hidalgo', 'latitud' => 20.1287862, 'longitud' => -98.73390882],
            ['institucion' => 'Instituto De Ciencias Y Estudios Superiores De Hidalgo, Campus Pachuca', 'latitud' => 20.11496037, 'longitud' => -98.72516693],
            ['institucion' => 'Instituto De Desarrollo Profesional De Hidalgo (IDEPH)', 'latitud' => 20.11878264, 'longitud' => -98.73960973],
            ['institucion' => 'Instituto De Enseñanza Superior Alfonso Cravioto', 'latitud' => 20.0758159, 'longitud' => -98.36723968],
            ['institucion' => 'Instituto De Estudios Superiores De Progreso De Obregon, Hidalgo', 'latitud' => 20.24234971, 'longitud' => -99.19442732],
            ['institucion' => 'Instituto De Estudios Superiores Del Altiplano (IESA)', 'latitud' => 19.78622045, 'longitud' => -98.58740065],
            ['institucion' => 'Instituto De Estudios Superiores Elise Freinet', 'latitud' => 20.10002956, 'longitud' => -98.74555921],
            ['institucion' => 'Instituto De Estudios Superiores Isima Plantel Pachuca', 'latitud' => 20.11739996, 'longitud' => -98.74231257],
            ['institucion' => 'Instituto De Estudios Superiores John F. Kennedy', 'latitud' => 19.31412246, 'longitud' => -98.8112159],
            ['institucion' => 'Instituto De Estudios Superiores Tiozihuatl', 'latitud' => 21.13977422, 'longitud' => -98.42130018],
            ['institucion' => 'Instituto De Formacion Profesional', 'latitud' => 20.0642958, 'longitud' => -98.75615557],
            ['institucion' => 'Instituto De Posgrado En Psicoterapia Cognitivo-Conductual', 'latitud' => 20.09656549, 'longitud' => -98.71011491],
            ['institucion' => 'Instituto Gastronomico Hidalguense', 'latitud' => 20.12472241, 'longitud' => -98.78257977],
            ['institucion' => 'Instituto Mexicano De Terapias Breves', 'latitud' => 19.38378746, 'longitud' => -99.17003087],
            ['institucion' => 'Instituto Tecnologico Cultural De Hidalgo', 'latitud' => 20.12694133, 'longitud' => -98.68693641],
            ['institucion' => 'Instituto Tecnologico De Atitalaquia', 'latitud' => 20.05502469, 'longitud' => -99.19756269],
            ['institucion' => 'Instituto Tecnologico De Educacion Superior', 'latitud' => 20.21090791, 'longitud' => -99.20839365],
            ['institucion' => 'Instituto Tecnologico De Estudios Superiores De Monterrey Campus Hidalgo', 'latitud' => 20.0966214, 'longitud' => -98.76723126],
            ['institucion' => 'Instituto Tecnologico De Huejutla', 'latitud' => 21.15410959, 'longitud' => -98.36969238],
            ['institucion' => 'Instituto Tecnologico De La Construccion', 'latitud' => 20.19306945, 'longitud' => -98.4401035],
            ['institucion' => 'Instituto Tecnologico De Pachuca', 'latitud' => 20.08326431, 'longitud' => -98.77298142],
            ['institucion' => 'Instituto Tecnologico Latinoamericano', 'latitud' => 20.05817629, 'longitud' => -98.74438249],
            ['institucion' => 'Instituto Tecnologico Latinoamericano Campus Tula', 'latitud' => 20.06290384, 'longitud' => -99.31980998],
            ['institucion' => 'Instituto Tecnologico Superior De Huichapan', 'latitud' => 20.31961524, 'longitud' => -99.70690513],
            ['institucion' => 'Instituto Tecnologico Superior Del Occidente Del Estado De Hidalgo', 'latitud' => 20.20505814, 'longitud' => -99.22241624],
            ['institucion' => 'Instituto Tecnologico Superior Del Oriente Del Estado De Hidalgo (ITESA)', 'latitud' => 19.72865796, 'longitud' => -98.46895572],
            ['institucion' => 'Instituto Universitario Conde De Guevara', 'latitud' => 20.12164509, 'longitud' => -98.7369541],
            ['institucion' => 'Instituto Universitario De Las Naciones Hispanas', 'latitud' => 20.07731343, 'longitud' => -98.78658525],
            ['institucion' => 'Instituto Universitario Del Centro De Mexico Campus Actopan', 'latitud' => 20.26980038, 'longitud' => -98.93911745],
            ['institucion' => 'Instituto Universitario Del Centro De Mexico Campus Pachuca', 'latitud' => 20.12624194, 'longitud' => -98.7298284],
            ['institucion' => 'Instituto Universitario Del Centro De Mexico Campus Tula De Allende', 'latitud' => 20.05363227, 'longitud' => -99.31374439],
            ['institucion' => 'Normal De Las Huastecas', 'latitud' => 21.13539719, 'longitud' => -98.40799992],
            ['institucion' => 'Normal Rural Luis Villarreal', 'latitud' => 20.22411694, 'longitud' => -99.08872647],
            ['institucion' => 'Normal Sierra Hidalguense', 'latitud' => 20.728671, 'longitud' => -98.63365429],
            ['institucion' => 'Normal Valle Del Mezquital', 'latitud' => 20.28089906, 'longitud' => -99.17668787],
            ['institucion' => 'San Felipe De Jesus', 'latitud' => 20.08195534, 'longitud' => -99.30815641],
            ['institucion' => 'Sistema De Universidad Virtual', 'latitud' => 20.46546863, 'longitud' => -98.27856974],
            ['institucion' => 'Colegio De Tráfico Aduanal Sobrecargo Y Especialidades', 'latitud' => 20.097729494343678, 'longitud' => -98.70915150387526],
            ['institucion' => 'Colegio Libre De Hidalgo', 'latitud' => 20.10389228421315, 'longitud' => -98.74715696340054],
            ['institucion' => 'Colegio Pablo Latapí Sarré', 'latitud' => 20.149306062915922, 'longitud' => -98.38099776055297],
            ['institucion' => 'Colegio Real Hidalgo', 'latitud' => 0.0, 'longitud' => 0.0],
            ['institucion' => 'Colegio Superior De Odontología', 'latitud' => 20.125505055344586, 'longitud' => -98.73298701021477],
            ['institucion' => 'Complejo Universitario Gridehs', 'latitud' => 20.301860959142353, 'longitud' => -98.67442366119387],
            ['institucion' => 'Dirección De Posgrado E Investigación', 'latitud' => 19.54387538051755, 'longitud' => -98.88036672497515],
            ['institucion' => 'División En Ciencias Administrativas', 'latitud' => 20.17696387286721, 'longitud' => -98.72657031714519],
            ['institucion' => 'El Colegio Del Estado De Hidalgo', 'latitud' => 20.13412871361283, 'longitud' => -98.80220482397267],
            ['institucion' => 'Escuela Bancaria Y Comercial, Campus Pachuca', 'latitud' => -20.103258084269715, 'longitud' => -98.75093267503898],
            ['institucion' => 'Escuela De Arquitectura', 'latitud' => 20.09665748984342, 'longitud' => -98.71086071778701],
            ['institucion' => 'Escuela De Arquitectura Y Diseño', 'latitud' => 0.0, 'longitud' => 0.0],
            ['institucion' => 'Escuela De Derecho', 'latitud' => 20.133303301486485, 'longitud' => -98.73721453386483],
            ['institucion' => 'Escuela De Estudios Superiores De Hidalgo ', 'latitud' => 20.400094820254488, 'longitud' => -98.19957637688597],
            ['institucion' => 'Escuela De Gastronomía', 'latitud' => 0.0, 'longitud' => 0.0],
            ['institucion' => 'Escuela De Ingeniería', 'latitud' => 19.33915499112728, 'longitud' => -99.04601665319845],
            ['institucion' => 'Escuela De Medicina Intermédica', 'latitud' => 20.110202476084183, 'longitud' => -98.77421837689191],
            ['institucion' => 'Escuela De Música Del Estado De Hidalgo', 'latitud' => 20.123044534865684, 'longitud' => -98.73042924064312],
            ['institucion' => 'Escuela De Pedagogía', 'latitud' => 20.08935452359636, 'longitud' => -98.77765191583804],
            ['institucion' => 'Escuela Jurídica Y Forense Del Sureste, Plantel Pachuca', 'latitud' => 20.060909639519604, 'longitud' => -98.78712121736757],
            ['institucion' => 'Escuela Libre De Derecho Del Estado De Hidalgo', 'latitud' => 20.123060233429452, 'longitud' => -98.74002090387467],
            ['institucion' => 'Escuela Normal Superior De Tulancingo, Luis Donaldo Colosio Murrieta', 'latitud' => 20.09006511035969, 'longitud' => -98.36859210572851],
            ['institucion' => 'Escuela Normal Superior Del Estado De Hidalgo, S.C.', 'latitud' => 20.09028404118017, 'longitud' => -98.77989253316008],
            ['institucion' => 'Escuela Normal Superior Miguel Hidalgo', 'latitud' => 20.24240747280191, 'longitud' => -99.19444238852768],    
            ['institucion' => 'Escuela Normal Superior Pública Del Estado De Hidalgo', 'latitud' => 20.079129478901564, 'longitud' => -98.78526768667788],
            ['institucion' => 'Escuela Superior Atotonilco De Tula', 'latitud' => 20.016085373919193, 'longitud' => -99.23605137689378],
            ['institucion' => 'Escuela Superior De Actopan', 'latitud' => 20.291586795162967, 'longitud' => -98.96507508435808],
            ['institucion' => 'Escuela Superior De Apan', 'latitud' => 19.655661470150832, 'longitud' => -98.51784192716106],
            ['institucion' => 'Escuela Superior De Ciudad Sahagún', 'latitud' => 19.754131336014144, 'longitud' => -98.59337481922687],
            ['institucion' => 'Escuela Superior De Educación Artística Armoniarte', 'latitud' => 20.12423948415242, 'longitud' => -98.74068515969395],
            ['institucion' => 'Escuela Superior De Huejutla', 'latitud' => 20.21650282894448, 'longitud' => -98.75004899549859],
            ['institucion' => 'Escuela Superior De Ingeniería Mecánica, Plantel Pachuca', 'latitud' => 0.0, 'longitud' => 0.0],
            
            ['institucion' => 'Escuela Superior De Tepeji Del Río', 'latitud' => 19.917099159344072, 'longitud' => -99.36007107504275],
            ['institucion' => 'Escuela Superior De Tizayuca', 'latitud' => 19.879025829162003, 'longitud' => -98.9675932196904],
            ['institucion' => 'Escuela Superior De Tlahuelilpan', 'latitud' => 20.131508188862856, 'longitud' => -99.23513227318534],
            ['institucion' => 'Escuela Superior De Zimapán', 'latitud' => 20.7473201095528, 'longitud' => -99.39393557297429],
            ['institucion' => 'Facultad De Ciencias Administrativas', 'latitud' => 20.18684172881634, 'longitud' => -98.73957265319846],
            ['institucion' => 'Facultad De Ciencias Humanas', 'latitud' => 20.156548863651032, 'longitud' => -98.7340794945434],
            ['institucion' => 'Facultad De Derecho', 'latitud' => 0.0, 'longitud' => 0.0],
            ['institucion' => 'Instituto De Administración Pública Del Estado De Hidalgo A.C.', 'latitud' => 20.128190722761016, 'longitud' => -98.73146910387462],
            ['institucion' => 'Instituto De Artes', 'latitud' => 20.136347519144465, 'longitud' => -98.67174280387447],
            ['institucion' => 'Unidad Académica De Chapulhuacán', 'latitud' => 21.155389, 'longitud' => -98.92925],
            ['institucion' => 'Unidad Académica De Cuautepec', 'latitud' => 20.0403, 'longitud' => -98.3222],
            ['institucion' => 'Unidad Académica De Metztitlán', 'latitud' => 20.58032, 'longitud' => -98.76262],
            ['institucion' => 'Unidad Académica De Santa Úrsula', 'latitud' => 19.4265, 'longitud' => -98.1575],
            ['institucion' => 'Unidad Académica De Tepetitlán', 'latitud' => 20.19175, 'longitud' => -99.33331],
            ['institucion' => 'Unidad Académica De Tezontepec De Aldama', 'latitud' => 20.16, 'longitud' => -99.205],
            ['institucion' => 'Unidad Profesional Interdisciplinaria De Ingeniería Campus Hidalgo', 'latitud' => 19.7027, 'longitud' => -98.9776],
            ['institucion' => 'Universidad Canadiense', 'latitud' => 20.0879, 'longitud' => -98.7618],
            ['institucion' => 'Universidad Científica Latino Americana De Hidalgo', 'latitud' => 20.1273, 'longitud' => -98.7333],
            ['institucion' => 'Universidad Del Desarrollo Profesional Tula De Allende', 'latitud' => 20.0453, 'longitud' => -99.3414],
            ['institucion' => 'Universidad Del Desarrollo Profesional Huichapan', 'latitud' => 20.3769, 'longitud' => -99.6552],
            ['institucion' => 'Universidad Del Futbol Y Ciencias Del Deporte', 'latitud' => 20.0202, 'longitud' => -98.8219],
            ['institucion' => 'Universidad Del Nuevo México', 'latitud' => 20.0773, 'longitud' => -98.7491],
            ['institucion' => 'Universidad Del Nuevo México, Campus Huichapan', 'latitud' => 20.383, 'longitud' => -99.6544],
            ['institucion' => 'Universidad Digital Del Estado De Hidalgo', 'latitud' => 20.1239, 'longitud' => -98.7267],
            ['institucion' => 'Universidad ETAC Campus Tulancingo', 'latitud' => 20.0911, 'longitud' => -98.3705],
            ['institucion' => 'Universidad Humanista Hidalgo', 'latitud' => 20.0813, 'longitud' => -98.7646],
            ['institucion' => 'Universidad Iberomexicana De Hidalgo', 'latitud' => 20.094, 'longitud' => -98.7602],
            ['institucion' => 'Universidad INECUH', 'latitud' => 20.0877, 'longitud' => -98.7639],
            ['institucion' => 'Universidad Interactiva Milenio', 'latitud' => 20.129, 'longitud' => -98.7249],
            ['institucion' => 'Universidad Interamericana Para El Desarrollo', 'latitud' => 20.0903, 'longitud' => -98.762],
            ['institucion' => 'Universidad Interamericana Para El Desarrollo, Sede Tula', 'latitud' => 20.0491, 'longitud' => -99.3348],
            ['institucion' => 'Universidad Intercultural Del Estado De Hidalgo', 'latitud' => 20.4806, 'longitud' => -99.1913],
            ['institucion' => 'Universidad Interglobal', 'latitud' => 20.1183, 'longitud' => -98.7344],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Central Pachuca', 'latitud' => 20.1223, 'longitud' => -98.7308],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Huejutla', 'latitud' => 21.1403, 'longitud' => -98.4187],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Ixmiquilpan', 'latitud' => 20.4753, 'longitud' => -99.2106],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Jacala', 'latitud' => 21.0014, 'longitud' => -99.1775],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Tenango De Doria', 'latitud' => 20.3517, 'longitud' => -98.3028],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Tula De Allende', 'latitud' => 20.0533, 'longitud' => -99.3444],
            ['institucion' => 'Universidad Pedagógica Nacional-Hidalgo Unidad 131 Sede Regional Tulancingo', 'latitud' => 20.09, 'longitud' => -98.37],
            ['institucion' => 'Universidad Politécnica De Francisco I. Madero', 'latitud' => 20.2281, 'longitud' => -99.195],
            ['institucion' => 'Universidad Politécnica De Huejutla', 'latitud' => 21.1294, 'longitud' => -98.42],
            ['institucion' => 'Universidad Politécnica De La Energía', 'latitud' => 20.088, 'longitud' => -98.7694],
            ['institucion' => 'Universidad Politécnica De Pachuca', 'latitud' => 20.1016, 'longitud' => -98.7628],
            ['institucion' => 'Universidad Politécnica De Tulancingo', 'latitud' => 20.0915, 'longitud' => -98.372],
            ['institucion' => 'Universidad Politécnica Metropolitana De Hidalgo', 'latitud' => 20.1087, 'longitud' => -98.7426],
            ['institucion' => 'Universidad Privada Del Centro', 'latitud' => 20.1329, 'longitud' => -98.7333],
            ]);
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituciones');
    }
}
