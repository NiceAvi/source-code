// this code is for insert upload file
if ($request->hasFile('file')) {
            //
            $i = 0;
            foreach ($request->file('file') as $file) {
                $fileName = time() . rand(0, 1000) . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/files/', $fileName);
                $input['doc_id'] = $request->doc_id[$i];
                $input['lead_id'] = $lead->id;
                $input['file'] = $fileName;
                LeadDocuments::create($input);
                $i++;
            }
        }

// this code is for update upload file

$documents = LeadDocuments::where('lead_id', $request->id)->get();
        if ($documents != null) {
            foreach ($documents as $document) {
                $image_path = public_path() . '/files/' . $document->file;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $documents = LeadDocuments::where('lead_id', $request->id)->delete();
        }
        if ($request->hasFile('file')) {
            //
            $i = 0;
            foreach ($request->file('file') as $file) {
                $fileName = time() . rand(0, 1000) . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/files/', $fileName);
                $input['doc_id'] = $request->doc_id[$i];
                $input['lead_id'] = $lead->id;
                $input['file'] = $fileName;
                LeadDocuments::create($input);
                $i++;
            }
}
