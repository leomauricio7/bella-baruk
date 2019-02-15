<div class="container-fluid">
        <div class="row">
        <!-- card graficos-->
          <div class="col-12 col-lg-6 col-xl">
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Usuários
                    </h6> 
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      1000
                    </span>
                    <!-- Badge -->
                    <span class="badge badge-soft-success mt-n1">
                      85
                    </span>
                  </div>
                  <div class="col-auto">
                    <!-- Icon -->
                    <span class="h2 fa fa-users text-muted mb-0"></span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-6 col-xl">
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Vendas
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      60
                    </span>
                  </div>
                  <div class="col-auto"> 
                    <!-- Icon -->
                    <span class="h2 fa fa-cart-plus text-muted mb-0"></span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
              
          </div>
          <div class="col-12 col-lg-6 col-xl">
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Pontuação
                    </h6>

                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <!-- Heading -->
                        <span class="h2 mr-2 mb-0">
                          20
                        </span>
                        
                      </div>
                      <div class="col">
                        <!-- Progress -->
                        <div class="progress progress-sm">
                          <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="col-auto">
                    <!-- Icon -->
                    <span class="h2 fa fa-cash-register text-muted mb-0"></span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
              
          </div>
          <div class="col-12 col-lg-6 col-xl">
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Saldo
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      R$85.50
                    </span>
                  </div>
                  <div class="col-auto"> 
                    <!-- Icon -->
                    <span class="h2 fa fa-money-check-alt text-muted mb-0"></span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>   
          </div>
        </div> <!-- / .row -->

        <div class="row">
          <div class="col-12 col-xl-8">
            
            <!-- Orders -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Vendas
                    </h4>
                  </div>
                  <div class="col-auto mr-n3">
                    <!-- Caption -->
                    <span class="text-muted">
                      Comparar meses:
                    </span>

                  </div>
                  <div class="col-auto">
                    <!-- Switch -->
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChart" data-add="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,10,20,12,7,0,8,16,18,16,10,22],&quot;backgroundColor&quot;:&quot;#d2ddec&quot;,&quot;label&quot;:&quot;Affiliate&quot;}]}}">
                      <label class="custom-control-label" for="cardToggle"></label>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="card-body">  
                <!-- Chart -->
                <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                  <canvas id="ordersChart" class="chart-canvas chartjs-render-monitor" width="631" height="300" style="display: block; width: 631px; height: 300px;"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-4">

            <!-- Devices -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Filiados
                    </h4>
                  </div>
                  <div class="col-auto">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                      <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[60,25,15]}]}}">
                        <a href="#" class="nav-link active" data-toggle="tab">
                          Todos
                        </a>
                      </li>
                      <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,45,20]}]}}">
                        <a href="#" class="nav-link" data-toggle="tab">
                          Nivel
                        </a>
                      </li>
                    </ul>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart chart-appended"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                  <canvas id="devicesChart" class="chart-canvas chartjs-render-monitor" data-target="#devicesChartLegend" width="631" height="241" style="display: block; width: 631px; height: 241px;"></canvas>
                </div>
                <!-- Legend -->
                <div id="devicesChartLegend" class="chart-legend"><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #2C7BE5"></i>Desktop</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #A6C5F7"></i>Tablet</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #D2DDEC"></i>Mobile</span></div>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->

        <div class="row">
          <div class="col-12 col-xl-12"> 
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Usuários
                    </h4>

                  </div>
                  <div class="col-auto">
                    <!-- Button -->
                    <a href="#!" class="btn btn-sm btn-white">
                      Export
                    </a>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-project">
                          Nome
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-status">
                          Status
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Progresso
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          Adesão
                        </a>
                      </th>
                      <th class="text-right">
                        Coordenador
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                        <td class="goal-project">
                            Marcelo Lima
                        </td>
                        <td class="goal-status">
                            <span class="text-warning">●</span> Não Ativo
                        </td>
                        <td class="goal-progress">
                            0%
                        </td>
                        <td class="goal-date">
                            <time datetime="2018-10-24">14/02/19</time>
                        </td>
                        <td class="text-right">
                            <div class="avatar-group">
                            <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Dianna Smiley">
                                <img src="http://www.marcelolimawebdesign.com.br/assets/membro/MarceloPerfil.png" class="avatar-img rounded-circle" alt="...">
                            </a>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#!" class="dropdown-item">
                                <i class="fa fa-eye"></i> Visualizar
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="fa fa-trash"></i> Excluir
                                </a>
                            </div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>