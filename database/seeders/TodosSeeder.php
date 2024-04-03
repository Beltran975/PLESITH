<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instituciones;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /*
    public function run(): void
    {
       /* $useradmin=User::create([
            'name' => 'admin PLESITH',
            'email' => 'admin@admin.com',
            'curp' => '',
            'institucion' => '',
            'programa' => '',
            'password' => Hash::make('admin'),
            'archivoCurp' => '',
            'image_path' => '',
            'tipo' => '',
            'fullacces' => 'yes',
            'codigo' => 'adm1'
        ]);

        //$this->call(InstitucionesSeeder::class);

        
    }*/

    public function run(): void
    {
        Instituciones::create(['nombre' => 'CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIO VALORES CON LIBERTAD, "CEVAL"']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS SUPERIORES ANTARES']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMÍA Y TURISMO']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS SUPERIORES IDDEA']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI']);
        Instituciones::create(['nombre' => 'CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMÉRICAS']);
        Instituciones::create(['nombre' => 'CENTRO DE TERAPIA FAMILIAR Y DE PAREJA']);
        Instituciones::create(['nombre' => 'CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES']);
        Instituciones::create(['nombre' => 'CENTRO HUMANISTA DE INVESTIGACIÓN Y DESARROLLO MULTIDISCIPLINARIO']);
        Instituciones::create(['nombre' => 'CENTRO REGIONAL DE EDUCACIÓN NORMAL BENITO JUÁREZ']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO ALLENDE']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO CONTINENTAL']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DE EDUCACIÓN A DISTANCIA']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MÉXICO']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DE LA CIUDAD DE MÉXICO']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO HIDALGUENSE']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO HIDALGUENSE A.C.']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO INTERAMERICANO']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO METROPOLITANO HIDALGO']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO SIGLO XXI']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN']);
        Instituciones::create(['nombre' => 'CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA']);
        Instituciones::create(['nombre' => 'CÍRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANÁLISIS EXISTENCIAL']);
        Instituciones::create(['nombre' => 'COLEGIO ANAHUAC']);
        Instituciones::create(['nombre' => 'COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO']);
        Instituciones::create(['nombre' => 'COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGÍA S.C.']);
        Instituciones::create(['nombre' => 'COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES']);
        Instituciones::create(['nombre' => 'COLEGIO LIBRE DE HIDALGO']);
        Instituciones::create(['nombre' => 'COLEGIO PABLO LATAPI SARRE']);
        Instituciones::create(['nombre' => 'COLEGIO REAL HIDALGO']);
        Instituciones::create(['nombre' => 'COLEGIO SUPERIOR DE ODONTOLOGÍA']);
        Instituciones::create(['nombre' => 'COMPLEJO UNIVERSITARIO GRIDEHS']);
        Instituciones::create(['nombre' => 'DIRECCIÓN DE POSGRADO E INVESTIGACIÓN']);
        Instituciones::create(['nombre' => 'DIVISIÓN EN CIENCIAS ADMINISTRATIVAS']);
        Instituciones::create(['nombre' => 'EL COLEGIO DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA']);
        Instituciones::create(['nombre' => 'ESCUELA DE ARQUITECTURA']);
        Instituciones::create(['nombre' => 'ESCUELA DE ARQUITECTURA Y DISEÑO']);
        Instituciones::create(['nombre' => 'ESCUELA DE DERECHO']);
        Instituciones::create(['nombre' => 'ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO "EESUPH"']);
        Instituciones::create(['nombre' => 'ESCUELA DE GASTRONOMÍA']);
        Instituciones::create(['nombre' => 'ESCUELA DE MEDICINA INTERMÉDICA']);
        Instituciones::create(['nombre' => 'ESCUELA DE MÚSICA DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'ESCUELA DE PEDAGOGÍA']);
        Instituciones::create(['nombre' => 'ESCUELA JURÍDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA']);
        Instituciones::create(['nombre' => 'ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA']);
        Instituciones::create(['nombre' => 'ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.']);
        Instituciones::create(['nombre' => 'ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO']);
        Instituciones::create(['nombre' => 'ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR ATOTONILCO DE TULA']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE ACTOPAN']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE APAN']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE CIUDAD SAHAGÚN']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE EDUCACIÓN ARTÍSTICA ARMONIARTE']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE HUEJUTLA']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE INGENIERÍA MECÁNICA, PLANTEL PACHUCA']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE TEPEJI DEL RÍO']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE TIZAYUCA']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE TLAHUELILPAN']);
        Instituciones::create(['nombre' => 'ESCUELA SUPERIOR DE ZIMAPÁN']);
        Instituciones::create(['nombre' => 'FACULTAD DE CIENCIAS ADMINISTRATIVAS']);
        Instituciones::create(['nombre' => 'FACULTAD DE CIENCIAS HUMANAS']);
        Instituciones::create(['nombre' => 'FACULTAD DE DERECHO']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE HIDALGO A.C.']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ARTES']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS AGROPECUARIAS']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS BÁSICAS E INGENIERÍA (ICBI)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS ECONÓMICO ADMINISTRATIVAS (ICEA)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO']);
        Instituciones::create(['nombre' => 'INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA']);
        Instituciones::create(['nombre' => 'INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY']);
        Instituciones::create(['nombre' => 'INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL']);
        Instituciones::create(['nombre' => 'INSTITUTO DE FORMACION PROFESIONAL']);
        Instituciones::create(['nombre' => 'INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL']);
        Instituciones::create(['nombre' => 'INSTITUTO GASTRONÓMICO HIDALGUENSE']);
        Instituciones::create(['nombre' => 'INSTITUTO MEXICANO DE TERAPIAS BREVES']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO DE ATITALAQUIA']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO DE HUEJUTLA']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO DE LA CONSTRUCCIÓN']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLOGICO DE PACHUCA']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO LATINOAMERICANO']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO LATINOAMERICANO CAMPUS TULA']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'INSTITUTO TECNOLÓGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)']);
        Instituciones::create(['nombre' => 'INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS']);
        Instituciones::create(['nombre' => 'INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS ACTOPAN']);
        Instituciones::create(['nombre' => 'INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS PACHUCA']);
        Instituciones::create(['nombre' => 'INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS TULA DE ALLENDE']);
        Instituciones::create(['nombre' => 'NORMAL DE LAS HUASTECAS']);
        Instituciones::create(['nombre' => 'NORMAL RURAL LUIS VILLARREAL']);
        Instituciones::create(['nombre' => 'NORMAL SIERRA HIDALGUENSE']);
        Instituciones::create(['nombre' => 'NORMAL VALLE DEL MEZQUITAL']);
        Instituciones::create(['nombre' => 'SAN FELIPE DE JESÚS']);
        Instituciones::create(['nombre' => 'SISTEMA DE UNIVERSIDAD VIRTUAL']);
        Instituciones::create(['nombre' => 'UNIDAD ACADÉMICA DE CHAPULHUACÁN']);
        Instituciones::create(['nombre' => 'UNIDAD ACADÉMICA DE CUAUTEPEC']);
        Instituciones::create(['nombre' => 'UNIDAD ACADÉMICA DE METZTITLÁN']);
        Instituciones::create(['nombre' => 'UNIDAD ACADEMICA DE SANTA ÚRSULA']);
        Instituciones::create(['nombre' => 'UNIDAD ACADÉMICA DE TEPETITLÁN']);
        Instituciones::create(['nombre' => 'UNIDAD ACADÉMICA DE TEZONTEPEC DE ALDAMA']);
        Instituciones::create(['nombre' => 'UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA CAMPUS HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD CANADIENSE']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD CIENTÍFICA LATINO AMERICANA DE HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DEL DESARROLLO PROFESIONAL (TULA DE ALLENDE)']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DEL DESARROLLO PROFESIONAL (HUICHAPAN)']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DEL NUEVO MÉXICO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DEL NUEVO MÉXICO, CAMPUS HUICHAPAN']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD ETAC CAMPUS TULANCINGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD HUMANISTA HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD IBEROMEXICANA DE HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INECUH']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INTERACTIVA MILENIO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD INTERGLOBAL']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA DE FRANCISCO I. MADERO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA DE HUEJUTLA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA DE LA ENERGÍA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA DE PACHUCA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA DE TULANCINGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD POLITÉCNICA METROPOLITANA DE HIDALGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD PRIVADA DEL CENTRO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA DE LA SIERRA HIDALGUENSE']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA DE LA ZONA METROPOLITANA DEL VALLE DE MÉXICO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA DE MINERAL DE LA REFORMA']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA DE TULANCINGO']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA DEL VALLE DEL MEZQUITAL']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA MINERA DE ZIMAPÁN']);
        Instituciones::create(['nombre' => 'UNIVERSIDAD TECNOLÓGICA TULA-TEPEJI']);

    }
}
