

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nom et Prenom :</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $participant->name ?? null) }}"  autofocus required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Date de Naissance :</label>
                                    <input type="date" class="form-control" name="birthday" id="birthday"
                                    value="{{ old('birthday', $participant->birthday ?? null) }}"     required>
                                </div>
                            </div>
                        </div>
         
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email', $participant->email ?? null) }}" 
                                    placeholder="example@example.com" autocomplete="false" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telephone : </label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone', $participant->phone ?? null) }}" 
                                        placeholder="06 ......" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cin">Cin :</label>
                                    <input type="text" class="form-control" name="cin" id="cin"
                                    value="{{ old('cin', $participant->cin ?? null) }}" 
                                    placeholder="Cin ..." required>
                                </div>
                            </div>
                        </div>