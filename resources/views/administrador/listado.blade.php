<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestión Nodos | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/datos-gob')
        @include('layouts.nav-admin')
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            <section class="admin seccion-obscura">
                <div class="row blanco">
                    <div class="col blanco"></div>
                    <div class="col obscuro">
                        <div class="titulo row d-flex  mb-3">
                            <h3>{{ __('Buscador | Nodos de colaboración') }}</h3>
                        </div>
                        <hr class="hr-gob">
                        <!-- filtros de busqueda-->
                        <div class="filtros nodos">
                            <form action="{{ route('buscar-listado') }}" method="GET" id="busqueda-form">
                                <div class="container text-center">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                                        <div class="col">
                                            <label for="region">Categoría:</label>
                                            <select class="form-control" name="region" id="region">
                                                <option name="categoria" disabled selected>Seleccionar</option>
                                                <option name="categoria" value="Nacional">Nacional</option>
                                                <option name="categoria" value="Internacional">Internacional</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="area">Líder:</label>
                                            <input class="form-control" type="text" name="area" id="area">
                                        </div>
                                        <div class="col">
                                            <label for="nombre">Área de conocimiento:</label>
                                            <select class="form-control" name="nombre" id="nombre">
                                                <option name="linea_inv" disabled selected>Seleccionar</option>
                                                <option name="linea_inv" value="ÁREA I. Físico-Matemáticas y Ciencias de la Tierra">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra</option>
                                                <option name="linea_inv" value="ÁREA II. Biología y Química">ÁREA II. Biología y Química</option>
                                                <option name="linea_inv" value="ÁREA III. Medicina y Ciencias de la Salud">ÁREA III. Medicina y Ciencias de la Salud </option>
                                                <option name="linea_inv" value="ÁREA IV. Ciencias de la Conducta y la Educación">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                                                <option name="linea_inv" value="ÁREA V. Humanidades">ÁREA V. Humanidades</option>
                                                <option name="linea_inv" value="ÁREA VI. Ciencias Sociales">ÁREA VI. Ciencias Sociales</option>
                                                <option name="linea_inv" value="ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                                                <option name="linea_inv" value="ÁREA VIII. Ingenierías y Desarrollo Tecnológico">ÁREA VIII. Ingenierías y Desarrollo Tecnológico</option>
                                                <option name="linea_inv" value="ÁREA IX. Multidisciplinaria">ÁREA IX. Multidisciplinaria</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="institucion">Institución ligada:</label>
                                            <select class="form-control" name="institucion" id="institucion">
                                                <option name="institucion_ligada" value="" disabled selected>Seleccionar</option>
                                                <option name="institucion_ligada" value="CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIO VALORES CON LIBERTAD">CENTRO DE ESTUDIO VALORES CON LIBERTAD, "CEVAL"</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES ANTARES">CENTRO DE ESTUDIOS SUPERIORES ANTARES</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMIA Y TURISMO">CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMÍA Y TURISMO</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES IDDEA">CENTRO DE ESTUDIOS SUPERIORES IDDEA</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI">CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI">CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI</option>
                                                <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMERICAS">CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMÉRICAS</option>
                                                <option name="institucion_ligada" value="CENTRO DE TERAPIA FAMILIAR Y DE PAREJA">CENTRO DE TERAPIA FAMILIAR Y DE PAREJA</option>
                                                <option name="institucion_ligada" value="CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES">CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES</option>
                                                <option name="institucion_ligada" value="CENTRO HUMANISTA DE INVESTIGACION Y DESARROLLO MULTIDISCIPLINARIO">CENTRO HUMANISTA DE INVESTIGACIÓN Y DESARROLLO MULTIDISCIPLINARIO</option>
                                                <option name="institucion_ligada" value="CENTRO REGIONAL DE EDUCACION NORMAL BENITO JUAREZ">CENTRO REGIONAL DE EDUCACIÓN NORMAL BENITO JUÁREZ</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO ALLENDE">CENTRO UNIVERSITARIO ALLENDE</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO CONTINENTAL">CENTRO UNIVERSITARIO CONTINENTAL</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL">CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE EDUCACION A DISTANCIA">CENTRO UNIVERSITARIO DE EDUCACIÓN A DISTANCIA</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS">CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MEXICO">CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MÉXICO</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE LA CIUDAD DE MEXICO">CENTRO UNIVERSITARIO DE LA CIUDAD DE MÉXICO</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO">CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO HIDALGUENSE">CENTRO UNIVERSITARIO HIDALGUENSE</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO HIDALGUENSE A.C.">CENTRO UNIVERSITARIO HIDALGUENSE A.C.</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO INTERAMERICANO">CENTRO UNIVERSITARIO INTERAMERICANO</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO METROPOLITANO HIDALGO">CENTRO UNIVERSITARIO METROPOLITANO HIDALGO</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO SIGLO XXI">CENTRO UNIVERSITARIO SIGLO XXI</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN">CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN</option>
                                                <option name="institucion_ligada" value="CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA">CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA</option>
                                                <option name="institucion_ligada" value="CIRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANALISIS EXISTENCIAL">CÍRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANÁLISIS EXISTENCIAL</option>
                                                <option name="institucion_ligada" value="COLEGIO ANAHUAC">COLEGIO ANAHUAC</option>
                                                <option name="institucion_ligada" value="COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO">COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO</option>
                                                <option name="institucion_ligada" value="COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGIA S.C.">COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGÍA S.C.</option>
                                                <option name="institucion_ligada" value="COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES">COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES</option>
                                                <option name="institucion_ligada" value="COLEGIO LIBRE DE HIDALGO">COLEGIO LIBRE DE HIDALGO</option>
                                                <option name="institucion_ligada" value="COLEGIO PABLO LATAPI SARRE">COLEGIO PABLO LATAPI SARRE</option>
                                                <option name="institucion_ligada" value="COLEGIO REAL HIDALGO">COLEGIO REAL HIDALGO</option>
                                                <option name="institucion_ligada" value="COLEGIO SUPERIOR DE ODONTOLOGIA">COLEGIO SUPERIOR DE ODONTOLOGÍA</option>
                                                <option name="institucion_ligada" value="COMPLEJO UNIVERSITARIO GRIDEHS">COMPLEJO UNIVERSITARIO GRIDEHS</option>
                                                <option name="institucion_ligada" value="DIRECCION DE POSGRADO E INVESTIGACION">DIRECCIÓN DE POSGRADO E INVESTIGACIÓN</option>
                                                <option name="institucion_ligada" value="DIVISION EN CIENCIAS ADMINISTRATIVAS">DIVISIÓN EN CIENCIAS ADMINISTRATIVAS</option>
                                                <option name="institucion_ligada" value="EL COLEGIO DEL ESTADO DE HIDALGO">EL COLEGIO DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA">ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA</option>
                                                <option name="institucion_ligada" value="ESCUELA DE ARQUITECTURA">ESCUELA DE ARQUITECTURA</option>
                                                <option name="institucion_ligada" value="ESCUELA DE ARQUITECTURA Y DISEÑO">ESCUELA DE ARQUITECTURA Y DISEÑO</option>
                                                <option name="institucion_ligada" value="ESCUELA DE DERECHO">ESCUELA DE DERECHO</option>
                                                <option name="institucion_ligada" value="ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO">ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO "EESUPH"</option>
                                                <option name="institucion_ligada" value="ESCUELA DE GASTRONOMIA">ESCUELA DE GASTRONOMÍA</option>
                                                <option name="institucion_ligada" value="ESCUELA DE INGENIERIA">ESCUELA DE INGENIERÍA</option>
                                                <option name="institucion_ligada" value="ESCUELA DE MEDICINA INTERMEDICA">ESCUELA DE MEDICINA INTERMÉDICA</option>
                                                <option name="institucion_ligada" value="ESCUELA DE MUSICA DEL ESTADO DE HIDALGO">ESCUELA DE MÚSICA DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="ESCUELA DE PEDAGOGIA">ESCUELA DE PEDAGOGÍA</option>
                                                <option name="institucion_ligada" value="ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA">ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA</option>
                                                <option name="institucion_ligada" value="ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO">ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA">ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA</option>
                                                <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.">ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.</option>
                                                <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO">ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO</option>
                                                <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO">ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR ATOTONILCO DE TULA">ESCUELA SUPERIOR ATOTONILCO DE TULA</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE ACTOPAN">ESCUELA SUPERIOR DE ACTOPAN</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE APAN">ESCUELA SUPERIOR DE APAN</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE CIUDAD SAHAGUN">ESCUELA SUPERIOR DE CIUDAD SAHAGÚN</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE EDUCACION ARTISTICA ARMONIARTE">ESCUELA SUPERIOR DE EDUCACIÓN ARTÍSTICA ARMONIARTE</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE HUEJUTLA">ESCUELA SUPERIOR DE HUEJUTLA</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE INGENIERIA MECANICA, PLANTEL PACHUCA">ESCUELA SUPERIOR DE INGENIERÍA MECÁNICA, PLANTEL PACHUCA</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TEPEJI DEL RIO">ESCUELA SUPERIOR DE TEPEJI DEL RIO</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TIZAYUCA">ESCUELA SUPERIOR DE TIZAYUCA</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TLAHUELILPAN">ESCUELA SUPERIOR DE TLAHUELILPAN</option>
                                                <option name="institucion_ligada" value="ESCUELA SUPERIOR DE ZIMAPAN">ESCUELA SUPERIOR DE ZIMAPÁN</option>
                                                <option name="institucion_ligada" value="FACULTAD DE CIENCIAS ADMINISTRATIVAS">FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
                                                <option name="institucion_ligada" value="FACULTAD DE CIENCIAS HUMANAS">FACULTAD DE CIENCIAS HUMANAS</option>
                                                <option name="institucion_ligada" value="FACULTAD DE DERECHO">FACULTAD DE DERECHO</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE HIDALGO A.C.">INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE HIDALGO A.C.</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ARTES">INSTITUTO DE ARTES</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS AGROPECUARIAS">INSTITUTO DE CIENCIAS AGROPECUARIAS</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS BASICAS E INGENIERIA (ICBI)">INSTITUTO DE CIENCIAS BÁSICAS E INGENIERÍA (ICBI)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)">INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS (ICEA)">INSTITUTO DE CIENCIAS ECONÓMICO ADMINISTRATIVAS (ICEA)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)">INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)">INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO">INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO">INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)">INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET">INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA">INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY">INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL">INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE FORMACION PROFESIONAL">INSTITUTO DE FORMACION PROFESIONAL</option>
                                                <option name="institucion_ligada" value="INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL">INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL</option>
                                                <option name="institucion_ligada" value="INSTITUTO GASTRONOMICO HIDALGUENSE">INSTITUTO GASTRONÓMICO HIDALGUENSE</option>
                                                <option name="institucion_ligada" value="INSTITUTO MEXICANO DE TERAPIAS BREVES">INSTITUTO MEXICANO DE TERAPIAS BREVES</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO">INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE ATITALAQUIA">INSTITUTO TECNOLÓGICO DE ATITALAQUIA</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR">INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO">INSTITUTO TECNOLÓGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE HUEJUTLA">INSTITUTO TECNOLÓGICO DE HUEJUTLA</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE LA CONSTRUCCION">INSTITUTO TECNOLÓGICO DE LA CONSTRUCCIÓN</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE PACHUCA">INSTITUTO TECNOLOGICO DE PACHUCA</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO LATINOAMERICANO">INSTITUTO TECNOLÓGICO LATINOAMERICANO</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO LATINOAMERICANO CAMPUS TULA">INSTITUTO TECNOLÓGICO LATINOAMERICANO CAMPUS TULA</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DE HUICHAPAN">INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO">INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)">INSTITUTO TECNOLÓGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)</option>
                                                <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO CONDE DE GUEVARA">INSTITUTO UNIVERSITARIO CONDE DE GUEVARA</option>
                                                <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS">INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS</option>
                                                <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS ACTOPAN">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS ACTOPAN</option>
                                                <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS PACHUCA">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS PACHUCA</option>
                                                <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS TULA DE ALLENDE">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS TULA DE ALLENDE</option>
                                                <option name="institucion_ligada" value="NORMAL DE LAS HUASTECAS">NORMAL DE LAS HUASTECAS</option>
                                                <option name="institucion_ligada" value="NORMAL RURAL LUIS VILLARREAL">NORMAL RURAL LUIS VILLARREAL</option>
                                                <option name="institucion_ligada" value="NORMAL SIERRA HIDALGUENSE">NORMAL SIERRA HIDALGUENSE</option>
                                                <option name="institucion_ligada" value="NORMAL VALLE DEL MEZQUITAL">NORMAL VALLE DEL MEZQUITAL</option>
                                                <option name="institucion_ligada" value="SAN FELIPE DE JESUS">SAN FELIPE DE JESUS</option>
                                                <option name="institucion_ligada" value="SISTEMA DE UNIVERSIDAD VIRTUAL">SISTEMA DE UNIVERSIDAD VIRTUAL</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE CHAPULHUACAN">UNIDAD ACADÉMICA DE CHAPULHUACÁN</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE CUAUTEPEC">UNIDAD ACADÉMICA DE CUAUTEPEC</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE METZTITLAN">UNIDAD ACADÉMICA DE METZTITLÁN</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE SANTA URSULA">UNIDAD ACADEMICA DE SANTA ÚRSULA</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE TEPETITLAN">UNIDAD ACADÉMICA DE TEPETITLÁN</option>
                                                <option name="institucion_ligada" value="UNIDAD ACADEMICA DE TEZONTEPEC DE ALDAMA">UNIDAD ACADÉMICA DE TEZONTEPEC DE ALDAMA</option>
                                                <option name="institucion_ligada" value="UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERIA CAMPUS HIDALGO">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA CAMPUS HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD CANADIENSE">UNIVERSIDAD CANADIENSE</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD CIENTIFICA LATINO AMERICANA DE HIDALGO">UNIVERSIDAD CIENTÍFICA LATINO AMERICANA DE HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL TULA DE ALLENDE">UNIVERSIDAD DEL DESARROLLO PROFESIONAL (TULA DE ALLENDE)</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL HUICHAPAN">UNIVERSIDAD DEL DESARROLLO PROFESIONAL (HUICHAPAN)</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE">UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DEL NUEVO MEXICO">UNIVERSIDAD DEL NUEVO MÉXICO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DEL NUEVO MEXICO, CAMPUS HUICHAPAN">UNIVERSIDAD DEL NUEVO MÉXICO, CAMPUS HUICHAPAN</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO">UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD ETAC CAMPUS TULANCINGO">UNIVERSIDAD ETAC CAMPUS TULANCINGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD HUMANISTA HIDALGO">UNIVERSIDAD HUMANISTA HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD IBEROMEXICANA DE HIDALGO">UNIVERSIDAD IBEROMEXICANA DE HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INECUH">UNIVERSIDAD INECUH</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INTERACTIVA MILENIO">UNIVERSIDAD INTERACTIVA MILENIO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO">UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD INTERGLOBAL">UNIVERSIDAD INTERGLOBAL</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO">UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE HUEJUTLA">UNIVERSIDAD POLITÉCNICA DE HUEJUTLA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE LA ENERGIA">UNIVERSIDAD POLITÉCNICA DE LA ENERGÍA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE PACHUCA">UNIVERSIDAD POLITÉCNICA DE PACHUCA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE TULANCINGO">UNIVERSIDAD POLITÉCNICA DE TULANCINGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA METROPOLITANA DE HIDALGO">UNIVERSIDAD POLITÉCNICA METROPOLITANA DE HIDALGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD PRIVADA DEL CENTRO">UNIVERSIDAD PRIVADA DEL CENTRO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE">UNIVERSIDAD TECNOLÓGICA DE LA HUASTECA HIDALGUENSE</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE">UNIVERSIDAD TECNOLÓGICA DE LA SIERRA HIDALGUENSE</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA ZONA METROPOLITANA DEL VALLE DE MEXICO">UNIVERSIDAD TECNOLÓGICA DE LA ZONA METROPOLITANA DEL VALLE DE MÉXICO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE MINERAL DE LA REFORMA">UNIVERSIDAD TECNOLÓGICA DE MINERAL DE LA REFORMA</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE TULANCINGO">UNIVERSIDAD TECNOLÓGICA DE TULANCINGO</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL">UNIVERSIDAD TECNOLÓGICA DEL VALLE DEL MEZQUITAL</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN">UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA MINERA DE ZIMAPAN">UNIVERSIDAD TECNOLÓGICA MINERA DE ZIMAPÁN</option>
                                                <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA TULA-TEPEJI">UNIVERSIDAD TECNOLÓGICA TULA-TEPEJI</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <!-- <input type="submit" value="Buscar"> -->
                                            <button class="button nodos" type="submit" value="buscar">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- resultados nodos -->
                            <div class="resultados nodos">
                                <div class="row">
                                    @foreach ($info as $i)
                                    <div class="col-md-4 mb-4">
                                        <div class="card nodos">
                                            <div class="card-header nodos">
                                                <h5 class="card-title">{{$i->tema_inv}}</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><strong>Categoría:</strong> {{$i->categoria}}</p>
                                                <p class="card-text"><strong>Líder:</strong> {{$i->lider}}</p>
                                                <p class="card-text"><strong>Área de conocimiento:</strong> {{$i->linea_inv}}</p>
                                                <p class="card-text"><strong>Institución ligada:</strong> {{$i->institucion_ligada}}</p>
                                                <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion-{{ $i->id }}">
                                                    Leer más
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--modal nodo -->
                                @foreach ($info as $i)
                                <div class="modal fade" id="Modal-crear-produccion-{{ $i->id }}">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{$i->tema_inv}}</h4>
                                                <button type="button" class="btn btn-secondary">Generar reporte <i class="bi bi-download"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="tabla-modal table table-borderless" >
                                                    <tbody>
                                                        <tr>
                                                            <th class="rotated-header">Tema de investigación: </th>
                                                            <td class="contenido-produccion">{{$i->tema_inv}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Categoría: </th>
                                                            <td class="contenido-produccion">{{$i->categoria}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Líder:</th>
                                                            <td class="contenido-produccion">{{$i->lider}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Colaboradores: </th>
                                                            <td class="contenido-produccion">{{$i->colaboradores}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Área de conocimiento:</th>
                                                            <td class="contenido-produccion">{{$i->linea_inv}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Institución ligada:: </th>
                                                            <td class="contenido-produccion">{{$i->institucion_ligada}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Descripción: </th>
                                                            <td class="contenido-produccion">{{$i->descripcion}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="rotated-header">Documentación: </th>
                                                            <td class="contenido-produccion"><a href="/nodos/{{$i->documento}}" target="blanck_">{{$i->documento}}</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <!-- script modal -->
    <!-- <script>
        $(document).ready(function(){
            $("#btnAbrirModalnodo").click(function(){
                $("#Modal-crear-produccion").modal();
            });
        });
    </script> -->
</html>