 <div class="col-lg-4 col-md-6">

                        <div class="modal modal-top fade" id="modalTop" tabindex="-1">
                          <div class="modal-dialog">
                            <form class="modal-content">
                                @csrf

                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTopTitle">Exportar tabela</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                               <div class="row gy-3">
                        <div class="col-md">
                          <div class="form-check form-check-inline mt-3">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio1"
                              value="option1"
                            />
                            <label class="form-check-label" for="inlineRadio1">Pdf</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio2"
                              value="option2"
                            />
                            <label class="form-check-label" for="inlineRadio2">Exel</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio2"
                              value="option2"
                            />
                            <label class="form-check-label" for="inlineRadio2">Docx</label>
                          </div>
                        </div>
                      </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="button" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>