<div>
    <div class="flex flex-wrap -mx-3">
        <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
          <div class="flex flex-wrap -mx-3">
              {{-- Card --}}
            {{-- <div class="w-full max-w-full px-3 mb-4 xl:mb-0 xl:w-1/2 xl:flex-none">
              <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="relative overflow-hidden rounded-2xl" style="background-image: url('../assets/img/curved-images/curved14.jpg')">
                  <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                  <div class="relative z-10 flex-auto p-4">
                    <i class="p-2 text-white fas fa-wifi"></i>
                    <h5 class="pb-2 mt-6 mb-12 text-white">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                    <div class="flex">
                      <div class="flex">
                        <div class="mr-6">
                          <p class="mb-0 leading-normal text-white text-sm opacity-80">Card Holder</p>
                          <h6 class="mb-0 text-white">Jack Peterson</h6>
                        </div>
                        <div>
                          <p class="mb-0 leading-normal text-white text-sm opacity-80">Expires</p>
                          <h6 class="mb-0 text-white">11/22</h6>
                        </div>
                      </div>
                      <div class="flex items-end justify-end w-1/5 ml-auto">
                        <img class="w-3/5 mt-2" src="../assets/img/logos/mastercard.png" alt="logo" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
              <div class="flex flex-wrap -mx-3">
                {{-- Wallet balance --}}
                <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                    
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-center">
                            <div class="w-12 h-12 flex justify-center items-center text-center bg-center bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl rounded-xl">
                                {{-- <i class="relative text-white opacity-100 fas fa-landmark text-xl top-31/100"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                    <path d="M2.273 5.625A4.483 4.483 0 0 1 5.25 4.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 3H5.25a3 3 0 0 0-2.977 2.625ZM2.273 8.625A4.483 4.483 0 0 1 5.25 7.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 6H5.25a3 3 0 0 0-2.977 2.625ZM5.25 9a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3H15a.75.75 0 0 0-.75.75 2.25 2.25 0 0 1-4.5 0A.75.75 0 0 0 9 9H5.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-auto p-4 pt-0 text-center">
                            <h6 class="mb-0 text-center">Wallet</h6>
                            <span class="leading-tight text-xs">Balance</span>
                            <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                            <h5 class="mb-0">{{$balance}}</h5>
                        </div>
                    </div>
                </div>

                {{-- Wallet fund --}}
                <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                    
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-center">
                            <div class="w-12 h-12 flex justify-center items-center text-center bg-center bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                  <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                  <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                                  <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-auto p-4 pt-0 text-center">
                            <h6 class="mb-0 text-center">Wallet</h6>
                            <span class="leading-tight text-xs">Fund your wallet</span>
                            <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                            <h5 class="mb-0 text-blue-500"><a href="#fund_input">Fund</a></h5>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
              <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                      <h6 class="mb-0">Fund wallet</h6>
                    </div>
                  </div>
                </div>
                <div class="flex-auto p-4">
                  <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" role="form">
                    @csrf
                    <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                    <input type="hidden" name="orderID" value="{{$orderID}}">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="reference" value="{{$reference}}"> <!-- required -->
                    
                    {{-- <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > <!-- For other necessary things you want to add to your payload. it is optional though --> --}}
                    {{-- <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> <!-- to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments --> --}}
                    {{-- <input type="hidden" name="split" value="{{ json_encode($split) }}"> <!-- to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits --> --}}
                    
                    <div class="flex flex-wrap -mx-3 items-center justify-between">
                      <div class="max-w-full px-3 mb-6 md:mb-0 md:flex-none">
                        <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                          <input id="fund_input" name="amount" class="mb-0 w-full text-2xl rounded-xl border-none" type="number" min="0">
                        </div>
                      </div>

                      <div class="max-w-full px-1 mb-6 md:mb-0 md:flex-none">
                        <div class="relative flex flex-row md:w-1/8 items-center justify-center flex-auto min-w-0 p-6 break-words bg-transparent shadow-none bg-clip-border">
                          <span class="text-2xl font-bold">.</span>
                        </div>
                      </div>

                      <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/5 md:flex-none">
                        <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                          <input class="mb-0 w-full text-2xl rounded-xl border-none" type="number" min="0" max="0" disabled placeholder="00">
                        </div>
                      </div>

                      <div class="max-w-full px-3 mb-6 md:mb-0 md:flex-none">
                        <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent shadow-none rounded-xl bg-clip-border">
                          <button type="submit" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">Continue</button>
                        </div>
                      </div>
                      
                      {{-- <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                        <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                          <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/visa.png" alt="logo" />
                          <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                          <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700" data-target="tooltip_trigger" data-placement="top"></i>
                          <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                            Edit Card
                            <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                  </form>
                </div>
              </div>
            </div>

            {{-- <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
              <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                      <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                      <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="javascript:;"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Card</a>
                    </div>
                  </div>
                </div>
                <div class="flex-auto p-4">
                  <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                      <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                        <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/mastercard.png" alt="logo" />
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                        <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700" data-target="tooltip_trigger" data-placement="top"></i>
                        <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                          Edit Card
                          <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                        </div>
                      </div>
                    </div>
                    <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                      <div class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                        <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/visa.png" alt="logo" />
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                        <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700" data-target="tooltip_trigger" data-placement="top"></i>
                        <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                          Edit Card
                          <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>

        {{-- Wallet funding --}}
        <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
          <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <div class="flex flex-wrap -mx-3">
                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                  <h6 class="mb-0">Wallet fundings</h6>
                </div>
                <div class="flex-none w-1/2 max-w-full px-3 text-right">
                  <button class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">View All</button>
                </div>
              </div>
            </div>
            <div class="flex-auto p-4 pb-0">
              <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex justify-between px-4 py-2 pl-0 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                  <div class="flex flex-col">
                    <h6 class="mb-1 font-semibold leading-normal text-sm text-slate-700">March, 01, 2020</h6>
                    <span class="leading-tight text-xs">#MS-415646</span>
                  </div>
                  <div class="flex items-center leading-normal text-sm">
                    $180
                    <button class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i class="mr-1 fas fa-file-pdf text-lg"></i> PDF</button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3">
      {{-- Billing Information --}}
      <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <h6 class="mb-0">Billing Information</h6>
          </div>
          <div class="flex-auto p-4 pt-6">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                <div class="flex flex-col">
                  <h6 class="mb-4 leading-normal text-sm">Oliver Liam</h6>
                  <span class="mb-2 leading-tight text-xs">Company Name: <span class="font-semibold text-slate-700 sm:ml-2">Viking Burrito</span></span>
                  <span class="mb-2 leading-tight text-xs">Email Address: <span class="font-semibold text-slate-700 sm:ml-2">oliver@burrito.com</span></span>
                  <span class="leading-tight text-xs">VAT Number: <span class="font-semibold text-slate-700 sm:ml-2">FRB1235476</span></span>
                </div>
                <div class="ml-auto text-right">
                  <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                  <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      {{-- Subscription History --}}
      <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
        <div class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                <h6 class="mb-0">My Order History</h6>
              </div>
            </div>
          </div>
          <div class="flex-auto p-4 pt-6">
            <h6 class="mb-4 font-bold leading-tight uppercase text-xs text-slate-500">Newest to oldest</h6>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                <div class="flex items-center">
                  <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                  <div class="flex flex-col">
                    <h6 class="mb-1 leading-normal text-sm text-slate-700">Apple</h6>
                    <span class="leading-tight text-xs">27 March 2020, at 04:30 AM</span>
                  </div>
                </div>
                <div class="flex flex-col items-center justify-center">
                  <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">+ $ 2,000</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
