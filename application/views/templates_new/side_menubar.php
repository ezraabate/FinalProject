 <!--category-->
                        <div class="collapse-menu mt-0 pull-right">
                            <ul>

                                <?php if($this->session->userdata('role') == '2'): ?>
                                <li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span></span></a>
                
                                </li>
                                <?php elseif($this->session->userdata('role') == '3'): ?>
                                    <li>Hello</li>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>