<section class="delete-section" style="max-width: 500px; margin: 40px auto;">

<!-- ENHANCED DELETE WARNING -->
<div class="delete-warning">
    <div class="warning-icon">
        <i class="fas fa-exclamation-triangle"></i>
    </div>
    
    <h2 class="delete-title">⚠️ Permanently Delete Account</h2>
    
    <p class="delete-description">
        This action will <strong>permanently delete</strong> your account and all associated data including:
        <br><br>
        - All animal records<br>
        - Sales history<br>
        - Vaccination & health records<br>
        - Profile information
    </p>
    
    <button 
        class="delete-trigger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        <i class="fas fa-trash-alt"></i> I Understand, Delete Account
    </button>
</div>

<!-- ENHANCED CONFIRMATION MODAL -->
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div class="confirm-modal">
        <div class="modal-header">
            <div class="modal-icon">
                <i class="fas fa-skull-crossbones"></i>
            </div>
            <h2 class="modal-title">Final Confirmation Required</h2>
            <p class="modal-description">
                This action <strong>CANNOT be undone</strong>. Type your password to confirm account deletion.
            </p>
        </div>
        
        <form method="post" action="{{ route('profile.destroy') }}" class="p-0">
            @csrf
            @method('delete')
            
            <div style="margin-bottom: 30px;">
                <input 
                    type="password" 
                    name="password"
                    class="password-input"
                    placeholder="•••••••• Enter your password"
                    required
                >
            </div>
            
            <div class="modal-buttons">
                <button type="button" 
                    x-on:click="$dispatch('close')"
                    class="btn-cancel">
                    <i class="fas fa-times"></i> Cancel
                </button>
                
                <button type="submit" class="btn-confirm">
                    <i class="fas fa-bomb"></i> Delete Forever
                </button>
            </div>
        </form>
    </div>
</x-modal>

</section>