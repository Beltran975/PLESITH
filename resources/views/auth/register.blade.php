<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <title>Registro | PLESITH</title>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
    <div class="content-registro form-group">
            <div class="row ml-5">
              <h3>{{ __('Registro de usuario') }}</h3>
            </div>
            <hr class="hr-gob" >
            <div class="card">
              <div class="card-header">
                <h3>Datos generales</h3>
              </div>
                <div class="card-body">
                <form action="{{ route('auth.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="name" >{{ __('Nombre completo *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="curp" class="">{{ __('CURP *')}}</label>
                  </div>
                  <div class="col-md-6">
                    <input id="curp" type="text" class="form-control" name="curp" required><br>
                    <input class="form-control" id="archivoCurp" type="file"  name="archivoCurp" required>
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="email" class="">{{ __('Correo *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="password" >{{ __('Contraseña *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
               <!-- <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="password-confirm">{{ __('Confirmar contraseña *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div> -->
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label for="institucion" class="control-label">{{ __('Institución a la que pertenece *')}}</label>
                  </div>
                  <div class="col-md-6">
                  <select class="form-control" name="institucion" id="institucion" required>
                      <option name="institucion" value="" disabled selected>Seleccionar</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE HUEJUTLA">INSTITUTO TECNOLOGICO DE HUEJUTLA</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE ATITALAQUIA">INSTITUTO TECNOLOGICO DE ATITALAQUIA</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE PACHUCA">INSTITUTO TECNOLOGICO DE PACHUCA</option>
                      <option name="institucion" value="NORMAL DE LAS HUASTECAS">NORMAL DE LAS HUASTECAS</option>
                      <option name="institucion" value="NORMAL SIERRA HIDALGUENSE">NORMAL SIERRA HIDALGUENSE</option>
                      <option name="institucion" value="NORMAL VALLE DEL MEZQUITAL">NORMAL VALLE DEL MEZQUITAL</option>
                      <option name="institucion" value="CENTRO REGIONAL DE EDUCACION NORMAL BENITO JUAREZ">CENTRO REGIONAL DE EDUCACION NORMAL BENITO JUAREZ</option>
                      <option name="institucion" value="ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO">ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="NORMAL RURAL LUIS VILLARREAL">NORMAL RURAL LUIS VILLARREAL</option>
                      <option name="institucion" value="UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERIA CAMPUS HIDALGO">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERIA CAMPUS HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA</option>
                      <option name="institucion" value=" UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE</option>
                      <option name="institucion" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA">UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA</option>
                      <option name="institucion" value="ESCUELA DE MUSICA DEL ESTADO DE HIDALGO">ESCUELA DE MUSICA DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO">INSTITUTO TECNOLOGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO SUPERIOR DE HUICHAPAN">INSTITUTO TECNOLOGICO SUPERIOR DE HUICHAPAN</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)">INSTITUTO TECNOLOGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)</option>
                      <option name="institucion" value="UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO">UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA DE TULANCINGO">UNIVERSIDAD POLITECNICA DE TULANCINGO</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA DE PACHUCA">UNIVERSIDAD POLITECNICA DE PACHUCA</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO">UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA METROPOLITANA DE HIDALGO">UNIVERSIDAD POLITECNICA METROPOLITANA DE HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA DE HUEJUTLA">UNIVERSIDAD POLITECNICA DE HUEJUTLA</option>
                      <option name="institucion" value="UNIVERSIDAD POLITECNICA DE LA ENERGIA">UNIVERSIDAD POLITECNICA DE LA ENERGIA</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE METZTITLAN">UNIDAD ACADEMICA DE METZTITLAN</option>
                      <option name="institucion" value="UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO">UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="INSTITUTO DE FORMACION PROFESIONAL">INSTITUTO DE FORMACION PROFESIONAL</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA TULA-TEPEJI">UNIVERSIDAD TECNOLOGICA TULA-TEPEJI</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DE TULANCINGO">UNIVERSIDAD TECNOLOGICA DE TULANCINGO</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL">UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE">UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE">UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE CHAPULHUACAN">UNIDAD ACADEMICA DE CHAPULHUACAN</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE SANTA URSULA">UNIDAD ACADEMICA DE SANTA URSULA</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DE LA ZONA METROPOLITANA DEL VALLE DE MEXICO">UNIVERSIDAD TECNOLOGICA DE LA ZONA METROPOLITANA DEL VALLE DE MEXICO</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE TEPETITLAN">UNIDAD ACADEMICA DE TEPETITLAN</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE TEZONTEPEC DE ALDAMA">UNIDAD ACADEMICA DE TEZONTEPEC DE ALDAMA</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA MINERA DE ZIMAPAN">UNIVERSIDAD TECNOLOGICA MINERA DE ZIMAPAN</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA DE MINERAL DE LA REFORMA">UNIVERSIDAD TECNOLOGICA DE MINERAL DE LA REFORMA</option>
                      <option name="institucion" value="UNIDAD ACADEMICA DE CUAUTEPEC">UNIDAD ACADEMICA DE CUAUTEPEC</option>
                      <option name="institucion" value="ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.">ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.</option>
                      <option name="institucion" value="ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA">ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA</option>
                      <option name="institucion" value="ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO">ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO</option>
                      <option name="institucion" value="FACULTAD DE DERECHO">FACULTAD DE DERECHO</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO ALLENDE">CENTRO UNIVERSITARIO ALLENDE</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA">CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA</option>
                      <option name="institucion" value="FACULTAD DE CIENCIAS HUMANAS">FACULTAD DE CIENCIAS HUMANAS</option>
                      <option name="institucion" value="ESCUELA DE ARQUITECTURA Y DISEÑO">ESCUELA DE ARQUITECTURA Y DISEÑO</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO SIGLO XXI">CENTRO UNIVERSITARIO SIGLO XXI</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO">CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE">UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO HIDALGUENSE A.C.">CENTRO UNIVERSITARIO HIDALGUENSE A.C.</option>
                      <option name="institucion" value="UNIVERSIDAD CANADIENSE">UNIVERSIDAD CANADIENSE</option>
                      <option name="institucion" value="ESCUELA DE INGENIERIA">ESCUELA DE INGENIERIA</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE EDUCACION ARTISTICA ARMONIARTE">ESCUELA SUPERIOR DE EDUCACION ARTISTICA ARMONIARTE</option>
                      <option name="institucion" value="ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA">ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE INGENIERIA MECANICA, PLANTEL PACHUCA">ESCUELA SUPERIOR DE INGENIERIA MECANICA, PLANTEL PACHUCA</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MEXICO">CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MEXICO</option>
                      <option name="institucion" value="ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO">ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="COLEGIO PABLO LATAPI SARRE">COLEGIO PABLO LATAPI SARRE</option>
                      <option name="institucion" value="INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS">INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA">INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA</option>
                      <option name="institucion" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS ACTOPAN">INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS ACTOPAN</option>
                      <option name="institucion" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS TULA DE ALLENDE">INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS TULA DE ALLENDE</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMERICAS">CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMERICAS</option>
                      <option name="institucion" value="INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)">INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)</option>
                      <option name="institucion" value="COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES">COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS">CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA</option>
                      <option name="institucion" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL">UNIVERSIDAD DEL DESARROLLO PROFESIONAL</option>
                      <option name="institucion" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL">UNIVERSIDAD DEL DESARROLLO PROFESIONAL</option>
                      <option name="institucion" value="UNIVERSIDAD CIENTIFICA LATINO AMERICANA DE HIDALGO">UNIVERSIDAD CIENTIFICA LATINO AMERICANA DE HIDALGO</option>
                      <option name="institucion" value="FACULTAD DE CIENCIAS ADMINISTRATIVAS">FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)">INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)</option>
                      <option name="institucion" value="COLEGIO ANAHUAC">COLEGIO ANAHUAC</option>
                      <option name="institucion" value="INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO">INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO</option>
                      <option name="institucion" value="CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES">CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES</option>
                      <option name="institucion" value="DIVISION EN CIENCIAS ADMINISTRATIVAS">DIVISION EN CIENCIAS ADMINISTRATIVAS</option>
                      <option name="institucion" value="ESCUELA DE DERECHO">ESCUELA DE DERECHO</option>
                      <option name="institucion" value="ESCUELA DE ARQUITECTURA">ESCUELA DE ARQUITECTURA</option>
                      <option name="institucion" value="ESCUELA DE PEDAGOGIA">ESCUELA DE PEDAGOGIA</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD ETAC CAMPUS TULANCINGO">UNIVERSIDAD ETAC CAMPUS TULANCINGO</option>
                      <option name="institucion" value="UNIVERSIDAD IBEROMEXICANA DE HIDALGO">UNIVERSIDAD IBEROMEXICANA DE HIDALGO</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO LATINOAMERICANO CAMPUS TULA">INSTITUTO TECNOLOGICO LATINOAMERICANO CAMPUS TULA</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO LATINOAMERICANO">INSTITUTO TECNOLOGICO LATINOAMERICANO</option>
                      <option name="institucion" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO</option>
                      <option name="institucion" value="UNIVERSIDAD DEL NUEVO MEXICO">UNIVERSIDAD DEL NUEVO MEXICO</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO CONTINENTAL">CENTRO UNIVERSITARIO CONTINENTAL</option>
                      <option name="institucion" value="COLEGIO REAL HIDALGO">COLEGIO REAL HIDALGO</option>
                      <option name="institucion" value="COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO">COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO METROPOLITANO HIDALGO">CENTRO UNIVERSITARIO METROPOLITANO HIDALGO</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL">CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL</option>
                      <option name="institucion" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA</option>
                      <option name="institucion" value="UNIVERSIDAD INTERACTIVA MILENIO">UNIVERSIDAD INTERACTIVA MILENIO</option>
                      <option name="institucion" value="UNIVERSIDAD DEL NUEVO MEXICO, CAMPUS HUICHAPAN">UNIVERSIDAD DEL NUEVO MEXICO, CAMPUS HUICHAPAN</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN">CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN</option>
                      <option name="institucion" value="ESCUELA DE GASTRONOMIA">ESCUELA DE GASTRONOMIA</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI">CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI</option>
                      <option name="institucion" value="CIRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANALISIS EXISTENCIAL">CIRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANALISIS EXISTENCIAL</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO">INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO</option>
                      <option name="institucion" value="UNIVERSIDAD INECUH">UNIVERSIDAD INECUH</option>
                      <option name="institucion" value="INSTITUTO UNIVERSITARIO CONDE DE GUEVARA">INSTITUTO UNIVERSITARIO CONDE DE GUEVARA</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI">CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR">INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR</option>
                      <option name="institucion" value="UNIVERSIDAD PRIVADA DEL CENTRO">UNIVERSIDAD PRIVADA DEL CENTRO</option>
                      <option name="institucion" value="INSTITUTO GASTRONOMICO HIDALGUENSE">INSTITUTO GASTRONOMICO HIDALGUENSE</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO">INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO</option>
                      <option name="institucion" value="CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS SUPERIORES IDDEA">CENTRO DE ESTUDIOS SUPERIORES IDDEA</option>
                      <option name="institucion" value="COLEGIO SUPERIOR DE ODONTOLOGIA">COLEGIO SUPERIOR DE ODONTOLOGIA</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY">INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO INTERAMERICANO">CENTRO UNIVERSITARIO INTERAMERICANO</option>
                      <option name="institucion" value="UNIVERSIDAD INTERGLOBAL">UNIVERSIDAD INTERGLOBAL</option>
                      <option name="institucion" value="UNIVERSIDAD HUMANISTA HIDALGO">UNIVERSIDAD HUMANISTA HIDALGO</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL">INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL</option>
                      <option name="institucion" value="ESCUELA DE MEDICINA INTERMEDICA">ESCUELA DE MEDICINA INTERMEDICA</option>
                      <option name="institucion" value="INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET">INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DE EDUCACION A DISTANCIA">CENTRO UNIVERSITARIO DE EDUCACION A DISTANCIA</option>
                      <option name="institucion" value="SAN FELIPE DE JESUS">SAN FELIPE DE JESUS</option>
                      <option name="institucion" value="CENTRO DE ESTUDIO VALORES CON LIBERTAD">CENTRO DE ESTUDIO VALORES CON LIBERTAD, "CEVAL"</option>
                      <option name="institucion" value="COLEGIO LIBRE DE HIDALGO">COLEGIO LIBRE DE HIDALGO</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS SUPERIORES ANTARES">CENTRO DE ESTUDIOS SUPERIORES ANTARES</option>
                      <option name="institucion" value="ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO">ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO "EESUPH"</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMIA Y TURISMO">CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMIA Y TURISMO</option>
                      <option name="institucion" value="CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                      <option name="institucion" value="ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA">ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA</option>
                      <option name="institucion" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS PACHUCA">INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS PACHUCA</option>
                      <option name="institucion" value="UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN">UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO">INSTITUTO TECNOLOGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE TLAHUELILPAN">ESCUELA SUPERIOR DE TLAHUELILPAN</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)">INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE ACTOPAN">ESCUELA SUPERIOR DE ACTOPAN</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE CIUDAD SAHAGUN">ESCUELA SUPERIOR DE CIUDAD SAHAGUN</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE TIZAYUCA">ESCUELA SUPERIOR DE TIZAYUCA</option>
                      <option name="institucion" value="INSTITUTO DE ARTES">INSTITUTO DE ARTES</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE TEPEJI DEL RIO">ESCUELA SUPERIOR DE TEPEJI DEL RIO</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE HUEJUTLA">ESCUELA SUPERIOR DE HUEJUTLA</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE ZIMAPAN">ESCUELA SUPERIOR DE ZIMAPAN</option>
                      <option name="institucion" value="ESCUELA SUPERIOR ATOTONILCO DE TULA">ESCUELA SUPERIOR ATOTONILCO DE TULA</option>
                      <option name="institucion" value="ESCUELA SUPERIOR DE APAN">ESCUELA SUPERIOR DE APAN</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS (ICEA)">INSTITUTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS (ICEA)</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)">INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS BASICAS E INGENIERIA (ICBI)">INSTITUTO DE CIENCIAS BASICAS E INGENIERIA (ICBI)</option>
                      <option name="institucion" value="INSTITUTO DE CIENCIAS AGROPECUARIAS">INSTITUTO DE CIENCIAS AGROPECUARIAS</option>
                      <option name="institucion" value="EL COLEGIO DEL ESTADO DE HIDALGO">EL COLEGIO DEL ESTADO DE HIDALGO</option>
                      <option name="institucion" value="DIRECCION DE POSGRADO E INVESTIGACION">DIRECCION DE POSGRADO E INVESTIGACION</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO DE LA CIUDAD DE MEXICO">CENTRO UNIVERSITARIO DE LA CIUDAD DE MEXICO</option>
                      <option name="institucion" value="INSTITUTO TECNOLOGICO DE LA CONSTRUCCION">INSTITUTO TECNOLOGICO DE LA CONSTRUCCION</option>
                      <option name="institucion" value="INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE HIDALGO A.C.">INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE HIDALGO A.C.</option>
                      <option name="institucion" value="COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGIA S.C.">COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGIA S.C.</option>
                      <option name="institucion" value="CENTRO HUMANISTA DE INVESTIGACION Y DESARROLLO MULTIDISCIPLINARIO">CENTRO HUMANISTA DE INVESTIGACION Y DESARROLLO MULTIDISCIPLINARIO</option>
                      <option name="institucion" value="COMPLEJO UNIVERSITARIO GRIDEHS">COMPLEJO UNIVERSITARIO GRIDEHS</option>
                      <option name="institucion" value="INSTITUTO MEXICANO DE TERAPIAS BREVES">INSTITUTO MEXICANO DE TERAPIAS BREVES</option>
                      <option name="institucion" value="INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL">INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL</option>
                      <option name="institucion" value="CENTRO DE TERAPIA FAMILIAR Y DE PAREJA">CENTRO DE TERAPIA FAMILIAR Y DE PAREJA</option>
                      <option name="institucion" value="CENTRO UNIVERSITARIO HIDALGUENSE">CENTRO UNIVERSITARIO HIDALGUENSE</option>
                      <option name="institucion" value="SISTEMA DE UNIVERSIDAD VIRTUAL">SISTEMA DE UNIVERSIDAD VIRTUAL</option>
                    </select>
                  </div>
                  <br>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="programa" class="">{{ __('Programa educativo *')}}</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="programa" type="text"  name="programa" required>
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label for="foto" class="control-label">{{ __('Fotografia de perfil *')}}</label>
                  </div>  
                  <div class="col-md-6">
                    <input class="form-control" id="image" type="file" name="image" required>
                  </div>
                </div>
                
                <div class="row d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Enviar') }}
                    </button>
                </div>
                
              </form>
                </div>
            </div>
    </div> 
    </main>
    @include('layouts/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
  </body>
  </html>