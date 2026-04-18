@extends('layouts.user')

@section('content')

<style>
/* ENHANCED PAGE TITLE */
.page-title {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    margin-bottom: 40px;
    background: linear-gradient(135deg, #0b5e20 0%, #42a65b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    animation: slideInDown 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.page-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #0b5e20, #42a65b);
    border-radius: 2px;
}

/* ENHANCED FORM CARD */
.form-card {
    max-width: 850px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.97);
    backdrop-filter: blur(20px);
    padding: 45px;
    border-radius: 24px;
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.12),
        0 8px 25px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
    animation: floatInUp 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0b5e20, #42a65b, #0b5e20);
    background-size: 200% 100%;
    animation: shimmer 3s infinite;
}

/* FORM HEADER */
.form-header {
    text-align: center;
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 2px solid rgba(11, 94, 32, 0.1);
}

.form-header i {
    font-size: 3rem;
    color: #42a65b;
    margin-bottom: 15px;
    display: block;
}

/* IMPROVED FORM GRID */
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
    margin-bottom: 35px;
}

/* ENHANCED FORM GROUP */
.form-group {
    position: relative;
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

/* ENHANCED LABELS */
.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #2d3748;
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-group label i {
    color: #42a65b;
    font-size: 1.1rem;
}

/* ENHANCED INPUTS */
.form-group input,
.form-group select {
    padding: 16px 20px;
    border: 2px solid rgba(11, 94, 32, 0.1);
    border-radius: 16px;
    outline: none;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    font-size: 1rem;
    font-weight: 500;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}

.form-group input::placeholder {
    color: #a0aec0;
    font-weight: 400;
}

/* INPUT FOCUS & HOVER */
.form-group input:focus,
.form-group input:hover,
.form-group select:focus,
.form-group select:hover {
    border-color: #0b5e20;
    box-shadow: 
        0 0 0 4px rgba(11, 94, 32, 0.1),
        0 8px 25px rgba(11, 94, 32, 0.15);
    background: rgba(255, 255, 255, 1);
    transform: translateY(-2px);
}

/* SELECT ENHANCEMENT */
.form-group select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 12px center;
    background-repeat: no-repeat;
    background-size: 18px;
    padding-right: 50px;
}

/* ENHANCED BUTTON AREA */
.form-buttons {
    margin-top: 40px;
    display: flex;
    justify-content: center;
    gap: 20px;
    padding-top: 30px;
    border-top: 2px solid rgba(11, 94, 32, 0.1);
}

/* PRIMARY BUTTON */
.form-buttons button[type="submit"] {
    padding: 16px 45px;
    background: linear-gradient(135deg, #0b5e20 0%, #42a65b 100%);
    color: white;
    border: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 
        0 10px 30px rgba(11, 94, 32, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.form-buttons button[type="submit"]:hover {
    transform: translateY(-4px);
    box-shadow: 
        0 20px 40px rgba(11, 94, 32, 0.5),
        0 8px 20px rgba(0, 0, 0, 0.15);
}

.form-buttons button[type="submit"]:active {
    transform: translateY(-2px) scale(0.98);
}

/* CANCEL BUTTON */
.cancel-btn {
    padding: 16px 40px;
    background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);
    color: white !important;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 
        0 8px 25px rgba(107, 114, 128, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    display: inline-block;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.cancel-btn:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 15px 35px rgba(107, 114, 128, 0.5),
        0 6px 15px rgba(0, 0, 0, 0.15);
    background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .form-card {
        padding: 30px 25px;
        margin: 20px 15px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .form-buttons {
        flex-direction: column;
    }
    
    .page-title {
        font-size: 1.8rem;
        margin-bottom: 30px;
    }
}

/* ENHANCED ANIMATIONS */
@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes floatInUp {
    from {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* LOADING STATE */
.form-card.loading {
    opacity: 0.8;
    pointer-events: none;
}
</style>

<div class="form-header">
    <i class="fas fa-plus-circle"></i>
    <h2 class="page-title">ADD NEW ANIMAL</h2>
    <p style="color: #6b7280; margin: 0; font-size: 1.1rem;">Enter animal details to get started</p>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('user.animals.store') }}" id="animalForm">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label><i class="fas fa-tag"></i> Animal Type</label>
                <input type="text" name="animal_type" required placeholder="e.g., Cow, Horse">
            </div>

            <div class="form-group">
                <label><i class="fas fa-paw"></i> Breed</label>
                <input type="text" name="breed" placeholder="e.g., Holstein, Angus">
            </div>

            <div class="form-group">
                <label><i class="fas fa-syringe"></i> Last Vaccination</label>
                <input type="date" name="last_vaccination">
            </div>

            <div class="form-group">
                <label><i class="fas fa-pills"></i> Last Deworming</label>
                <input type="date" name="last_deworming">
            </div>

            <div class="form-group">
                <label><i class="fas fa-heartbeat"></i> Status</label>
                <select name="status" required>
                    <option value="" disabled selected>Select status</option>
                    <option value="Alive">🟢 Alive</option>
                    <option value="Sold">🟡 Sold</option>
                    <option value="Dead">🔴 Dead</option>
                </select>
            </div>
        </div>

        <div class="form-buttons">
            <button type="submit">
                <i class="fas fa-save"></i> SAVE ANIMAL
            </button>
            <a href="{{ route('user.dashboard') }}">
                <button type="button" class="cancel-btn">
                    <i class="fas fa-times"></i> CANCEL
                </button>
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('animalForm').addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> SAVING...';
    submitBtn.disabled = true;
    
    // Re-enable after 3 seconds if needed
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 3000);
});
</script>

@endsection